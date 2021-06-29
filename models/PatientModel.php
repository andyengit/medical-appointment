<?php
class PatientModel
{
    private $appointmentsDate;
    private $appointmentsSpecialities;

    function __construct()
    {
        $this->db = Database::connect();
    }

    public function setAppointmentsDate($date)
    {
        $this->appointmentsDate = strClean($date);
    }

    public function setAppointmentsSpecialities($date)
    {
        $this->appointmentsSpecialities = $date;
    }

    public function searchSpecialities()
    {
        $sql = "SELECT * FROM specialities";
        $query = $this->db->query($sql);
        $result = $query->fetch_all();
        $_SESSION['specialities'] = $result;
    }
    public function searchAppointments()
    {
        $sqlOne = "SELECT * FROM DOCTORS WHERE SPECIALITY_ID = ('{$this->appointmentsSpecialities}')";
        $queryOne = $this->db->query($sqlOne);
        $_SESSION['docInfo'] = $queryOne->fetch_all();
            $arrCi  = "";
            foreach ($_SESSION['docInfo'] as $iterador) {
                $arrCi .= $iterador[1] . " OR CI = ";
            }
            $arrCi = rtrim($arrCi, " OR CI = ");
            $sqlTwo = "SELECT * FROM USERS WHERE CI = " . $arrCi;
            $queryTwo = $this->db->query($sqlTwo);
            $_SESSION['userDocInfo'] = $queryTwo->fetch_all();
    }

}
