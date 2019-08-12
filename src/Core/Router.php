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
            $user->userAction();
        } elseif ($_SERVER['REQUEST_URI'] == '/login') {
            $user->loginUser();
        } elseif ($_SERVER['REQUEST_URI'] == '/reg_form') {
            $user->showRegForm();
        } elseif ($_SERVER['REQUEST_URI'] == '/register') {
            $user->registerNewUser();
        } elseif ($_SERVER['REQUEST_URI'] == '/user_list') {
            $user->showUserList();
        } elseif ($_SERVER['REQUEST_URI'] == '/upload') {
            $files->showUploadForm();
        } elseif ($_SERVER['REQUEST_URI'] == '/file_upload') {
            $files->addNewFile();
        } elseif ($_SERVER['REQUEST_URI'] == '/file_list') {
            $files->showFiles();
        } elseif ($_SERVER['REQUEST_URI'] == '/admin') {
            print 'Минуточку, сейчас позову админа...';
        } else {
            header('Location: /');
            return null;
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