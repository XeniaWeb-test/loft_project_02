<?php

namespace App\Controllers;

use App\Tools\Session;
use App\Tools\View;

abstract class BaseController
{
    protected $session;

    protected $view;

    protected $user;

    public function __construct()
    {
        $this->session = new Session();
        $this->view = new View();
    }

    protected function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
}