<?php

namespace App\Controllers;

use App\Models\FileModel;
use App\Models\UserModel;
use Exception;

class UserController extends BaseController
{
    public function userAction()
    {
        $authForm =$this->view->render('userAuth.phtml', [

        ]);
        $layoutContent = $this->view->render('layout.phtml', [
            'content' => $authForm
        ]);

        print ($layoutContent);
    }

    public function loginUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $old_user = $_POST['old_user'];
        }

        if (!empty($old_user['login'])) {
            $model = new UserModel();
            $userId = $model->checkUser($old_user);
            $errors = [];
            if (!$userId) {
                $errors['login'] = 'Пользователь с таким Login не найден';
            }
            if (!count($errors) and $userId) {

                $old_user['hash_pass'] =  $model->getHashPass($old_user['user_pass']);
                $userAll = $model->getAllAboutUserById($userId->id);
                if ($old_user['hash_pass'] === $userAll ->user_pass) {
                    $this->session->login($userId->id);
                } else {
                    $errors['user_pass'] = 'Вы ввели неверный пароль';
                }
            }
        } else {
            $errors['login'] = 'Введите действующий логин';
//            $this->redirect('/');
        }
        if (count($errors)) {
            $errors['form'] = 'Пожалуйста, исправьте ошибки в форме.';

            $authForm =$this->view->render('userAuth.phtml', [
                'old_user' => $old_user,
                'errors' => $errors,
                'user' => $userAll ?? null
            ]);
            $layoutContent = $this->view->render('layout.phtml', [
                'content' => $authForm
            ]);

            print ($layoutContent);
            exit;


        } else {
            $this->redirect('/admin');
        }
    }
    public function welcome()
    {
        $model = new UserModel();
        $myUser = $this->session->getUser();
        $user = $model->getAllAboutUserById($myUser);

        $adminHome = $this->view->render('admin.phtml', [
            'user' => $user
        ]);
        $layoutContent = $this->view->render('layout.phtml', [
            'content' => $adminHome
        ]);

        print ($layoutContent);
    }
/**
 * @return void
 * @throws Exception
 */
    public function registerNewUser() {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $new_user = $_POST['new_user'];
            $file = $_FILES['jpg_img'];
            $about = $_POST['file']['about'];

            $required = ['login', 'user_pass', 'user_name', 'age', 'descript'];
            $dict = ['login' => 'Логин*', 'user_pass' => 'Пароль', 'user_name' => 'Имя пользователя',
                'descript' => 'Описание', 'age' => 'Возраст', 'avatar' => 'Аватар'];
            $errors = [];
            foreach ($required as $key) {
                if (empty($new_user[$key])) {
                    $errors[$key] = 'Это поле надо заполнить';
                }
            };
        }
        if (isset($new_user)) {
            $model = new UserModel();
            $newUserId = $model->saveUser($new_user);

        }
        if (isset($newUserId)) {
            $this->session->login($newUserId);
        }
        if(isset($file) && isset($about)) {
            $model = new FileModel();
            $ret = $model->addFile($file, $about);
        }
        if(!isset($ret)) {
            throw new Exception('Загрузка не удалась.');
        }


        $this->redirect('/admin');
    }

    public function showRegForm()
    {
        $regForm = $this->view->render('userRegister.phtml', [

        ]);
        $layoutContent = $this->view->render('layout.phtml', [
            'content' => $regForm
        ]);

        print ($layoutContent);
    }

    public function showUserList()
    {
        $model = new UserModel();
        $list = $model->getUserList();

        $userList = $this->view->render('userList.phtml', [
            'list' => $list
        ]);
        $layoutContent = $this->view->render('layout.phtml', [
            'content' => $userList
        ]);

        print ($layoutContent);
    }

    public function logout()
    {
        $this->session->closeSession();
        $this->redirect('/');
    }
    public function createUsers(array $new_user)
    {

    }
}