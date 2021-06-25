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

        $user->setName($_POST["name"]);
        $user->setLastName($_POST["lastName"]);
        $user->setCi($_POST["ci"]);
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
        $user->setBirthDate($_POST["birthDate"]);
        $user->setPhone($_POST["phone"]);

        $user->save();

        header("Location:".base_url."?controller=user&&action=register");
    }
}

