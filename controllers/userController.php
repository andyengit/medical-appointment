<?php

class userController {
    public function index() {
        echo "Controlador User Accion Index.";
    }

    public function login() {
        require_once "views/user/login.php";
    }

    public function register() {
        require_once "views/user/register.php";
    }
}

