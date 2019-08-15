<?php

namespace App\Controllers;

use App\Models\FileModel;
use App\Models\UserModel;
use Exception;

class UserController extends BaseController
{
    public function userAction()
    {
//        if(!$_SESSION) {
//            echo 'Сессия есть!'; die;
//        }
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
            $user = $model->checkUser($old_user);

            if (!$user) {
                $errors['email'] = 'Пользователь с таким E-mail не найден';
            }
            if (!count($errors) and $user) {
                if (password_verify($old_user['password'], $user['password'])) {
                    $_SESSION['user'] = $user;
                } else {
                    $errors['password'] = 'Вы ввели неверный пароль';
                }
            }
        } else {
            $errors['email'] = 'Введите действующий E-mail в правильном формате';
        }
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
            $ret = $model->saveUser($new_user);

        }
        if(isset($file) && isset($about)) {
            $model = new FileModel();
            $ret = $model->addFile($file, $about);
        }
        if(!isset($ret)) {
            throw new Exception('Загрузка не удалась.');
        }

        header('Location: /user_list'); // TODO relocate
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
}