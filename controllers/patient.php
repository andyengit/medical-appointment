<?php
class Patient extends Controllers
{
    function __construct()
    {
        $this->role = 'patient';
        parent::__construct();

    }

    public function inicio(){
        $this->views->getView($this,$this->role, "inicio");
        
    }
    public function stepOne(){
        $this->views->getView($this,$this->role, "reservarStepOne");
    }
    public function stepTwo(){
        $this->views->getView($this,$this->role, "reservarStepTwo");
    }

    public function LogOut(){
        session_destroy();
        $_SESSION = NULL;
        header("Location: ".base_url());
    }




}
