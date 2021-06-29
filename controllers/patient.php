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
        $patient = new PatientModel();

        $patient->searchSpecialities();
        $this->views->getView($this,$this->role, "reservarStepOne");
        $_SESSION['specialities'] = NULL;

    }
    public function stepTwo(){

        if($_SERVER["REQUEST_METHOD"] != "GET" || !isset($_GET)) {
            header("Location:".base_url());
        }

            $patient = new PatientModel();
            $patient->setAppointmentsSpecialities($_GET['Especialidad']);

            $this->views->getView($this,$this->role, "reservarStepTwo");    

        
        
        
    }

    public function stepThree(){

    }

    public function LogOut(){
        session_destroy();
        $_SESSION = NULL;
        header("Location: ".base_url());
    }




}
