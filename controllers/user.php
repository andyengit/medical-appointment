<?php

class User extends Controllers
{
    

    public function __construct()
    {
        $this->role = 'User';
        parent::__construct();
    }

    public function index()
    {
        $this->views->getView($this, $this->role, "inicio");
    }

    public function login()
    {
        $this->views->getView($this, $this->role, "login");
        if (isset($_SESSION['errors'])) {
            $_SESSION['errors'] = NULL;
        }
    }
    public function nosotros(){
        $this->views->getView($this, $this->role, "nosotros");
    }
    public function register()
    {
        $this->views->getView($this, $this->role, "register");
        if (isset($_SESSION['errors'])) {
            $_SESSION['errors'] = NULL;
        }
    }
    public function admin(){
        $this->views->getView($this, $this->role, "admin");
    }

    public function adminLogin(){ 
        if ($_SERVER["REQUEST_METHOD"] != "POST")
        header("Location:" . base_url());

        $center = new UserModel;
        $center->setAdminName($_POST['nameAdmin']);
        $center->setPasswordL($_POST['password']);
        $header = $center->adminLogin();

        header($header);
    }

    public function validateRegister()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST")
            header("Location:" . base_url());

        $user = new UserModel();

        $user->setName($_POST["name"]);
        $user->setLastName($_POST["lastName"]);
        $user->setCi($_POST["ci"]);
        $user->setCityId($_POST["city"]);
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
        $user->setPasswordL($_POST["password"]);
        $user->setBirthDate($_POST["birthDate"]);
        $user->setPhone($_POST["phone"]);

        $header = $user->save();
        header($header);
    }

    public function validateLogin()
    {
     
    
        $user = new UserModel();

        $user->setCi($_POST['ci']);
        $user->setPasswordL($_POST['password']);

        $header = $user->search();
        header($header);

    }
}
