<?php
class Errors extends Controllers{

    public function __construct()
    {
        parent::__construct();
    }

    public function notFound()
    {
        $this->views->getView($this,'errors', "notFound");
    }
    public function building()
    {
        $this->views->getView($this,'errors', "building");
    }
    
}
$notFound =new Errors();
$notFound->notFound();

