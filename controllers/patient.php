<?php
class Patient extends Controllers
{
    function __construct()
    {
        $this->role = 'patient';
        parent::__construct();

    }

    public function inicio(){
        $this->views->getView($this, "inicio");
        
    }
    public function stepOne(){
        $this->views->getView($this, "stepOne");
        
    }

    public function LogOut(){
        session_destroy();
        $_SESSION = NULL;
        header("Location: ".base_url());
    }




}
