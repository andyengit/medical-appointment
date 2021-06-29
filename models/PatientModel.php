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
        $sqlOne = "SELECT * FROM doctors WHERE speciality_id = ('{$this->appointmentsSpecialities}')";
        $queryOne = $this->db->query($sqlOne);
        $_SESSION['docInfo'] = $queryOne->fetch_all();
            $arrCi  = "";
            foreach ($_SESSION['docInfo'] as $iterador) {
                $arrCi .= $iterador[1] . " OR ci = ";
            }
            $arrCi = rtrim($arrCi, " OR ci = ");
            $sqlTwo = "SELECT * FROM users WHERE ci = " . $arrCi;
            $queryTwo = $this->db->query($sqlTwo);
            $_SESSION['userDocInfo'] = $queryTwo->fetch_all();
    }

}
