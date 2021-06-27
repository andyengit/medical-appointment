<?php
class User extends Controllers
{   

    public function __construct(){
        parent::__construct();

    }

    public function index(){
        If($_SESSION['globalRol'] != 'User'){
                header("Location:".base_url().$_SESSION['globalRol']."/inicio");
            }
        $this->views->getView($this, "inicio");
        
    }

    public function login(){
        If($_SESSION['globalRol'] != 'User'){
            header("Location:".base_url().$_SESSION['globalRol']."/inicio");
        }
        $this->views->getView($this, "login");

    }
    public function register(){
        If($_SESSION['globalRol'] != 'User'){
            header("Location:".base_url().$_SESSION['globalRol']."/inicio");
        }
        $this->views->getView($this, "register");

    }
    public function validateRegister() {
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
