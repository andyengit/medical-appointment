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
    public function citas(){
        $this->views->getView($this,$this->role, "citas");

    }
    
    public function LogOut(){
        session_destroy();
        $_SESSION = NULL;
        header("Location: ".base_url());
    }
}