<?php
class Center extends Controllers
{
    function __construct()
    {
        $this->role = 'center';
        parent::__construct();

    }

    public function inicio(){
        $this->views->getView($this,$this->role, "inicio");
        
    }
    
    public function registerSpeciality() {
        $center = new CenterModel();
        $center->searchSpeciality();
        $this->views->getView($this, $this->role, "registerSpeciality");
        $_SESSION['specialitiesList'] = NULL;
    }
    public function insertSpeciality(){
        if ($_SERVER["REQUEST_METHOD"] != "POST" || empty($_POST['name']))
        header("Location:" . base_url());

        $center = new CenterModel();
        $center->setName($_POST['name']);
        $center->insertSpeciality();

        header("Location: ".base_url()."center/registerSpeciality");

        $_SESSION['messComp'] = NULL;

    }

    public function registerDoctor() {

        $center = new CenterModel();
        $center->searchSpeciality();
        $this->views->getView($this, $this->role, "registerDoc");
        $_SESSION['messComp'] = NULL;
        $_SESSION['errors'] = NULL;
    }

    public function insertDoctor(){
        if ($_SERVER["REQUEST_METHOD"] != "POST")
        header("Location:" . base_url());

        $center = new CenterModel();
        $center->setNameDoc($_POST["name"]);
        $center->setLastName($_POST["lastName"]);
        $center->setCi($_POST["ci"]);
        $center->setEmail($_POST["email"]);
        $center->setPassword($_POST["password"]);
        $center->setPasswordL($_POST['password']);
        $center->setBirthDate($_POST["birthDate"]);
        $center->setPhone($_POST["phone"]);
        $center->setCityId($_POST["city"]);
        $center->setSpecialityId($_POST['speciality']);
        $center->setStartTime($_POST['startTime']);
        $center->setEndTime($_POST['endTime']);
        $center->setCost($_POST['cost']);
        $center->save();

        header("Location: ".base_url()."center/registerDoctor");

    }
    
    
    public function LogOut(){
        session_destroy();
        $_SESSION = NULL;
        header("Location: ".base_url());
    }
    
    
}