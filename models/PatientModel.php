<?php
class PatientModel
{
    private $patientId;
    private $appointmentsDate;
    private $appointmentsSpecialities;
    private $appointmentsDoc;
    private $appointmentsTime;

    function __construct()
    {
        $this->db = Database::connect();
    }

    public function setId($date)
    {
        $this->patientId = strClean($date);
    }

    public function setAppointmentsDate($date)
    {
        $this->appointmentsDate = strClean($date);
    }

    public function setAppointmentsSpecialities($date)
    {
        $this->appointmentsSpecialities = strClean($date);
    }

    public function setAppointmentsDoc($date)
    {
        $this->appointmentsDoc = strClean($date);
    }
    public function setAppointmentsTime($date)
    {
        $tempstr = strClean($date);
        $this->appointmentsTime = date('H:i', $tempstr);
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
        $sql = "SELECT USERS.NAME,USERS.LASTNAME,USERS.CI,DOCTORS.speciality_id,doctors.start_hour,
            doctors.end_hour,doctors.cost,specialities.name,doctors.id FROM USERS INNER JOIN doctors ON users.ci = doctors.ci INNER JOIN
            specialities ON specialities.id = doctors.speciality_id WHERE
            doctors.speciality_id = ('{$this->appointmentsSpecialities}')";
        $query = $this->db->query($sql);
        $_SESSION['docInfo'] = $query->fetch_all();
        $_SESSION['appointment']['specialities'] = $this->appointmentsSpecialities;
        $_SESSION['appointment']['date'] = $this->appointmentsDate;
        $_SESSION['appointment']['specialitiesName'] = $_SESSION['docInfo'][0][7];
        $_SESSION['appointment']['name'] = "Dr/a. " . $_SESSION['docInfo'][0][0] . " " . $_SESSION['docInfo'][0][1];
    }

    public function verifyAppointments(): bool
    {
        $sql = "SELECT doctor_id,patient_id,a_date,a_time FROM appointments WHERE doctor_id = '{$this->appointmentsDoc}' 
            AND a_date = '{$this->appointmentsDate}' AND a_time = '{$this->appointmentsTime}'";
        $query = $this->db->query($sql);
        $result = $query->fetch_all();
        if ($result != NULL && sizeof($result) != 0) {
            $_SESSION['errors']['noEmpty'] = "Ya Existe una cita a esa hora.";
            return false;
        } else {
            $_SESSION['appointment']['Doc'] = $this->appointmentsDoc;
            $_SESSION['appointment']['time'] = $this->appointmentsTime;
            return true;
        }
    }

    public function insertAppointment(): bool
    {
        $sql = "INSERT INTO appointments VALUES (
        NULL,'{$this->appointmentsDoc}','{$this->patientId}','{$this->appointmentsDate}','{$this->appointmentsTime}')";
        $query = $this->db->query($sql);
        if ($query) {
            return true;
        } else return false;
    }
    public function appointmentsList(){
        $sql = "SELECT * FROM appointments";
        $query = $this->db->query($sql);
        $_SESSION['appointmentsList'] = $query->fetch_all();
    }
}
