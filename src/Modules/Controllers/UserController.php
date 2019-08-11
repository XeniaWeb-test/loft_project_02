<?php

namespace App\Modules\Controllers;

use App\Core\View;

class UserController
{
    public function userAction()
    {
        $render = new View();
        $authForm = $render->render('userAuth.phtml', [

        ]);
        $layoutContent = $render->render('layout.phtml', [
            'content' => $authForm
        ]);

        print ($layoutContent);
    }

    public function userRegister()
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
        $render = new View();
        $userList = $render->render('userList.phtml', [

        ]);
        $layoutContent = $render->render('layout.phtml', [
            'content' => $userList
        ]);

        print ($layoutContent);
    }
}