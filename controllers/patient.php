<?php
class Patient extends Controllers
{
    function __construct()
    {
        $this->role = 'patient';
        parent::__construct();
    }

    public function inicio()
    {
        $this->views->getView($this, $this->role, "inicio");
    }
    public function stepOne()
    {
        $_SESSION['appointment'] = NULL;
        $patient = new PatientModel();

        $patient->searchSpecialities();
        $this->views->getView($this, $this->role, "reservarStepOne");
        $_SESSION['specialities'] = NULL;
        $_SESSION['errors'] = NULL;
    }
    public function stepTwo()
    {

        if ($_SERVER["REQUEST_METHOD"] != "GET" || !isset($_GET['Especialidad']) || !isset($_GET['fecha']) || empty($_GET['Especialidad']) || empty($_GET['fecha']) )  {
            header("Location:" . base_url()."patient/stepOne");
        } 

        $patient = new PatientModel();
        $patient->setAppointmentsSpecialities($_GET['Especialidad']);
        $patient->setAppointmentsDate($_GET['fecha']);
        $patient->searchAppointments();

        $this->views->getView($this, $this->role, "reservarStepTwo");
        $_SESSION['docInfo'] = NULL;
        $_SESSION['errors'] = NULL;
    }

    public function stepThree()
    {
        if ($_SERVER["REQUEST_METHOD"] != "GET" || !isset($_GET['Hora']) || !isset($_GET['Doc']) || empty($_GET['Hora']) || empty($_GET['Doc'])) {
            header("Location:" . base_url()."patient/steptwo");
        }
        $patient = new PatientModel();
        $patient->setAppointmentsTime($_GET['Hora']);
        $patient->setAppointmentsDoc($_GET['Doc']);
        $patient->setAppointmentsDate($_SESSION['appointment']['date']);
        $redirect = $patient->verifyAppointments();
        If($redirect){
            $this->views->getView($this, $this->role, "reservarStepThree");
        }else{
            header("Location:" . base_url()."patient/stepTwo?Especialidad=".$_SESSION['appointment']['specialities']."&fecha=".$_SESSION['appointment']['date']);
        }
    }
    public function stepOk(){
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            header("Location:" . base_url()."patient/stepOne");
        }
        $patient = new PatientModel();
        $patient->setAppointmentsDate($_SESSION['appointment']['date']);
        $patient->setAppointmentsDoc($_POST['Doc']);
        $patient->setAppointmentsTime($_POST['Hora']);
        $patient->setId($_SESSION['globalId']);
        $result = $patient->insertAppointment();
        if($result){
            $this->views->getView($this, $this->role, "reservarOk");

        } else header("Location:" . base_url()."patient/stepTwo?Especialidad=".$_SESSION['appointment']['specialities']."&fecha=".$_SESSION['appointment']['date']);
        $_SESSION['appointment'] = NULL;
    }
    public function appointments(){

        $patient = new PatientModel();
        $patient->setId($_SESSION['globalId']);
        $patient->setDateNow();
        $patient->appointmentsList();
        $this->views->getView($this, $this->role, "appointments");
        $_SESSION['appointmentsList'] = NULL;
        $_SESSION['errors'] = NULL;
    }
    public function appointmentsLast(){

        $patient = new PatientModel();
        $patient->setId($_SESSION['globalId']);
        $patient->appointmentsLastList();
        $this->views->getView($this, $this->role, "lastAppointments");
        $_SESSION['appointmentsList'] = NULL;
        $_SESSION['errors'] = NULL;
    }



    public function LogOut()
    {
        session_destroy();
        $_SESSION = NULL;
        header("Location: " . base_url());
    }
}
