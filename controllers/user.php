<?php
class User extends Controllers
{   

    public function __construct(){
        $this->role = 'User';
        parent::__construct();

    }

    public function index(){
        $this->views->getView($this,$this->role, "inicio");
        
    }

    public function login(){
        $this->views->getView($this,$this->role, "login");

    }
    public function register(){
        $this->views->getView($this,$this->role, "register");

    }
    public function validateRegister() {
        if($_SERVER["REQUEST_METHOD"] != "POST")
            header("Location:".base_url());

        $user = new UserModel();

        $user->setName($_POST["name"]);
        $user->setLastName($_POST["lastName"]);
        $user->setCi($_POST["ci"]);
        $user->setCityId($_POST["city"]);
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
        $user->setBirthDate($_POST["birthDate"]);
        $user->setPhone($_POST["phone"]);

        $header = $user->save();
        header($header);
    }

    public function validateLogin() {
        if($_SERVER["REQUEST_METHOD"] != "POST")
            header("Location:".base_url());

        $user = new UserModel();

        $user->setCi($_POST['ci']);
        $user->setPasswordL($_POST['password']);

        $header = $user->search();
        header($header);

    }
}
