<?php
class PatientModel
{
    private $patientId;
    private $appointmentsDate;
    private $appointmentsSpecialities;
    private $appointmentsDoc;
    private $appointmentsTime;
    private $dateNow;
    private $appointmentId;

    function __construct()
    {
        $this->db = Database::connect();
    }
    public function setDateNow()
    {
        $this->dateNow =  date('Y-m-d', time());
    }

    public function setAppointmentId($date)
    {
        $this->appointmentId = strClean($date);
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
        $sql = "SELECT users.name,users.lastname,users.ci,doctors.speciality_id,doctors.start_hour,
            doctors.end_hour,doctors.cost,specialities.name,doctors.id FROM users INNER JOIN doctors ON users.ci = doctors.ci INNER JOIN
            specialities ON specialities.id = doctors.speciality_id WHERE
            doctors.speciality_id = ('{$this->appointmentsSpecialities}')";
        $query = $this->db->query($sql);
        $_SESSION['docInfo'] = $query->fetch_all();
        if (sizeof($_SESSION['docInfo']) > 0 || $_SESSION['docInfo'] != NULL) {
            $_SESSION['appointment']['specialities'] = $this->appointmentsSpecialities;
            $_SESSION['appointment']['date'] = $this->appointmentsDate;
            $_SESSION['appointment']['specialitiesName'] = $_SESSION['docInfo'][0][7];
        }
    }


    public function verifyAppointments(): bool
    {
        $sql = "SELECT appointments.doctor_id,
            appointments.patient_id,
            appointments.a_date,
            appointments.a_time
            FROM appointments
            WHERE appointments.doctor_id = '{$this->appointmentsDoc}' 
            AND appointments.a_date = '{$this->appointmentsDate}' 
            AND appointments.a_time = '{$this->appointmentsTime}'";
        $query = $this->db->query($sql);
        $result = $query->fetch_all();
        if ($result != NULL && sizeof($result) != 0) {
            $_SESSION['errors']['noEmpty'] = "Ya Existe una cita a esa hora.";
            return false;
        } else {
            $sqlTwo = "SELECT users.name,users.lastname FROM users 
            INNER JOIN doctors ON doctors.ci = users.ci
            WHERE doctors.id = '{$this->appointmentsDoc}'";
            $queryTwo = $this->db->query($sqlTwo);
            $resultTwo = $queryTwo->fetch_all();
            $_SESSION['appointment']['name'] = "Dr/a. " . $resultTwo[0][0] . " " . $resultTwo[0][1];
            $_SESSION['appointment']['Doc'] = $this->appointmentsDoc;
            $_SESSION['appointment']['time'] = $this->appointmentsTime;
            return true;
        }
    }

    public function insertAppointment(): bool
    {
        $sql = "INSERT INTO appointments VALUES (
        NULL,'{$this->appointmentsDoc}','{$this->patientId}','{$this->appointmentsDate}','{$this->appointmentsTime}','1','0')";
        $query = $this->db->query($sql);
        if ($query) {
            return true;
        } else return false;
    }
    public function appointmentsList()
    {
        $sql = "SELECT appointments.id,users.name,users.lastname,appointments.a_date,appointments.a_time FROM appointments 
        INNER JOIN doctors ON doctors.id = appointments.doctor_id 
        INNER JOIN users ON doctors.ci = users.ci 
        WHERE appointments.patient_id = ('{$this->patientId}') AND appointments.a_date >= ('{$this->dateNow}') AND appointments.status = ('1')
        ORDER BY appointments.a_date,appointments.a_time DESC;";
        $query = $this->db->query($sql);
        $result = $query->fetch_all();
        if (sizeof($result) != 0) {
            $_SESSION['appointmentsList'] = $result;
        } else {
            $_SESSION['errors']['appointmentEmpty'] = "No hay ninguna cita proxima.";
        }
    }
    public function appointmentsLastList()
    {
        $sql = "SELECT appointments.id,users.name,users.lastname,appointments.a_date,appointments.a_time,appointments.status,appointments.presence FROM appointments 
        INNER JOIN doctors ON doctors.id = appointments.doctor_id 
        INNER JOIN users ON doctors.ci = users.ci 
        WHERE appointments.patient_id = ('{$this->patientId}') 
        ORDER BY appointments.a_date DESC;";
        $query = $this->db->query($sql);
        $result = $query->fetch_all();
        if (sizeof($result) != 0) {
            $_SESSION['appointmentsLastList'] = $result;
        } else {
            $_SESSION['errors']['appointmentEmpty'] = "No hay citas registradas";
        }
    }

    public function appointmentDelete()
    {
        $sql = "UPDATE appointments SET status = '0' WHERE id = '{$this->appointmentId}'";
        $query = $this->db->query($sql);
        if (!$query) {
            $_SESSION['errors']['cantDelete'] = "No se pudo borrar la cita.";
        } else {
            $_SESSION['messComp'] = "Cita eliminada correctamente.";
        }
    }
}
