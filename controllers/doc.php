<?php
class Doc extends Controllers
{
    function __construct()
    {
        $this->role = 'doc';
        parent::__construct();

    }

    public function inicio(){
        $this->views->getView($this,$this->role, "inicio");
        
    }
    public function appointments(){
        $doc = new DocModel();
        $doc->setId($_SESSION['globalId']);
        $doc->setDateNow();
        $doc->appointmentsList();
        $this->views->getView($this,$this->role, "appointments");

    }
    
    public function LogOut(){
        session_destroy();
        $_SESSION = NULL;
        header("Location: ".base_url());
    }
}