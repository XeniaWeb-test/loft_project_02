<?php

namespace App\Core;

use App\Modules\Controllers\FilesController;
use App\Modules\Controllers\UserController;

class Router
{
    public function run()
    {
        $user = new UserController();
        $files = new FilesController();
        if ($_SERVER['REQUEST_URI'] == '/') {
//            echo 'Будем запускать стартовый контроллер!';
            $user->userAction();
        } elseif ($_SERVER['REQUEST_URI'] == '/register') {
//            echo 'Выдаю форму регистрации.';
            $user->userRegister();
        } elseif ($_SERVER['REQUEST_URI'] == '/user_list') {
            $user->showUserList();
        } elseif ($_SERVER['REQUEST_URI'] == '/file_list') {
            $files->showFiles();
        } elseif ($_SERVER['REQUEST_URI'] == '/admin') {
            print 'Минуточку, сейчас позову админа...';
        } else {
            $this->showError('404.phtml');
        }

    }

    private function showError($tplErr)
    {
        $render = new View();
        $errorRouting = $render->render($tplErr, [

        ]);
        $layoutContent = $render->render('layout.phtml', [
            'content' => $errorRouting
        ]);

        print ($layoutContent);
    }
}