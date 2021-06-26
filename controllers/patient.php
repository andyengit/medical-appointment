<?php
class Patient extends Controllers
{
    function __construct()
    {
        parent::__construct();
    }

    public function inicio(){
        $this->session($this);
        $this->views->getView($this, "inicio");
    }

}
