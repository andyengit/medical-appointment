<?php
class User extends Controllers
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->views->getView($this, "inicio");
    }

    public function login(){
        $this->views->getView($this, "login");

    }
    public function register(){
        $this->views->getView($this, "register");

    }
    public function validate() {
        if($_SERVER["REQUEST_METHOD"] != "POST")
            header("Location:".base_url());

        $user = new UserModel();

        $user->setName($_POST["name"]);
        $user->setLastName($_POST["lastName"]);
        $user->setCi($_POST["ci"]);
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
        $user->setBirthDate($_POST["birthDate"]);
        $user->setPhone($_POST["phone"]);

        $user->save();

        header("Location:".base_url()."user/register");
    }
}
