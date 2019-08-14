<?php

namespace App\Controllers;

use App\Models\FileModel;
use App\Models\UserModel;
use App\Models\View;
use Exception;


class UserController
{
    public function userAction()
    {
//        if(!$_SESSION) {
//            echo 'Сессия есть!'; die;
//        }
        $render = new View();
        $authForm = $render->render('userAuth.phtml', [

        ]);
        $layoutContent = $render->render('layout.phtml', [
            'content' => $authForm
        ]);

        print ($layoutContent);
    }

    public function loginUser()
    {
        if ($_POST) {
            // TODO  ?
        }

    }

    /**
     * @return int|null
     * @throws Exception
     */
    public function registerNewUser() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $new_user = $_POST['new_user'];
            $file = $_FILES['jpg_img'];
            $about = $_POST['file']['about'];

        // TODO перенести проверки в Model и доделать
            $required = ['login', 'user_pass', 'user_name', 'age', 'descript'];
            $dict = ['login' => 'Логин*', 'user_pass' => 'Пароль', 'user_name' => 'Имя пользователя',
                'descripr' => 'Описание', 'age' => 'Возраст', 'avatar' => 'Аватар'];
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
        $render = new View();
        $regForm = $render->render('userRegister.phtml', [

        ]);
        $layoutContent = $render->render('layout.phtml', [
            'content' => $regForm
        ]);

        print ($layoutContent);
    }

    public function showUserList()
    {
        $model = new UserModel();
        $list = $model->getUserList();

        $render = new View();
        $userList = $render->render('userList.phtml', [
            'list' => $list
        ]);
        $layoutContent = $render->render('layout.phtml', [
            'content' => $userList
        ]);

        print ($layoutContent);
    }
}