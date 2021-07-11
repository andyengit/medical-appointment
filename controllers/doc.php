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
        $_SESSION['appointmentsList'] = NULL;

    }
    public function appointmentsLast(){

        $Doc = new DocModel();
        $Doc->setId($_SESSION['globalId']);
        $Doc->appointmentsLastList();
        $this->views->getView($this, $this->role, "lastAppointments");
        $_SESSION['appointmentsLastList'] = NULL;
        $_SESSION['errors'] = NULL;
        $_SESSION['messComp'] = NULL;
    }

    public function appointmentUpdate(){
        if ($_SERVER["REQUEST_METHOD"] != "POST" || empty($_POST['id'])) {
            header("Location:" . base_url()."doc/appointments");
        }
        $doc = new DocModel();
        $doc->setAppointmentId($_POST['id']);
        $doc->appointmentUpdate();
        header("Location:" . base_url()."doc/appointments");

    }

    
    public function LogOut(){
        session_destroy();
        $_SESSION = NULL;
        header("Location: ".base_url());
    }
}