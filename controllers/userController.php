<?php
require_once "models/user.php";
require_once "config/parameters.php";

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

    public function validate() {
        if($_SERVER["REQUEST_METHOD"] != "POST")
            header("Location:".base_url);
            
        $user = new User();

        $user->validate($_POST);

        header("Location:".base_url."?controller=user&&action=register");
    }
}

