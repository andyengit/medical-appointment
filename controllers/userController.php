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
            
        $name = $_POST["name"];
        $lastName = $_POST["lastName"];
        $ci = $_POST["ci"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $date = $_POST["date"];
        $phone = $_POST["phone"];

        $user = new User($name, $lastName, $password, $email, $ci, $phone, $date);

        $user->validate($_POST);

        header("Location:".base_url."?controller=user&&action=register");
    }
}

