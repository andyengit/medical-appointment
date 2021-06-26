<?php
class Errors extends Controllers{

    public function __construct()
    {
        parent::__construct();
    }

    public function notFound()
    {
        $this->views->getView($this, "404");
    }
    
}
$notFound =new Errors();
$notFound->notFound();
