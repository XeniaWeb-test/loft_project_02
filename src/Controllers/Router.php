<?php

namespace App\Controllers;

class Router extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->session();
    }

    protected function session()
{
    session_start();
}
    public function run()
    {

        $user = new UserController();
        $files = new FilesController();

        if ($_SERVER['REQUEST_URI'] == '/') {
            $user->userAction();
        } elseif ($_SERVER['REQUEST_URI'] == '/login') {
            $user->loginUser();
        } elseif ($_SERVER['REQUEST_URI'] == '/logout') {
            $user->logout();
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
            $user->welcome();
        } else {
            header('Location: /');
            return null;
        }
    }

    private function showError($tplErr)
    {
        $errorRouting = $this->view->render($tplErr, [

        ]);
        $layoutContent = $this->view->render('layout.phtml', [
            'content' => $errorRouting
        ]);

        print ($layoutContent);
    }
}