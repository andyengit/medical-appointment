<?php
class Center extends Controllers
{
    function __construct()
    {
        $this->role = 'Center';
        parent::__construct();

    }

    public function inicio(){
        $this->views->getView($this,$this->role, "inicio");
        
    }
    
    public function LogOut(){
        session_destroy();
        $_SESSION = NULL;
        header("Location: ".base_url());
    }

    public function registerSpeciality() {
        $this->views->getView($this, $this->role, "registerSpeciality");
    }
}