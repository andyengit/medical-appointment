<?php
class DocModel
{
    private $DocId;
    private $dateNow;
    private $appointmentId;

    function __construct()
    {
        $this->db = Database::connect();
    }

    public function setId($date)
    {
        $this->DocId = strClean($date);
    }
    public function setAppointmentId($date)
    {
        $this->appointmentId = strClean($date);
    }
    public function setDateNow(){
        $this->dateNow =  date('Y-m-d',time());
    }

    public function appointmentsList() {
        $sql = "SELECT appointments.id,users.name,users.lastname,appointments.a_date,appointments.a_time FROM appointments 
        INNER JOIN patients ON patients.id = appointments.patient_id
        INNER JOIN users ON patients.ci = users.ci 
        WHERE appointments.doctor_id = ('{$this->DocId}') AND appointments.a_date >= ('{$this->dateNow}') AND appointments.status = ('1')
        ORDER BY appointments.a_date,appointments.a_time DESC;";
        $query = $this->db->query($sql);
        $result = $query->fetch_all();
        if(sizeof($result) !=0 ){
            $_SESSION['appointmentsList'] = $result;
        } else {
            $_SESSION['errors']['appointmentEmpty'] = "No hay ninguna cita proxima.";
        }
    }
    public function appointmentsLastList() {
        $sql = "SELECT appointments.id,users.name,users.lastname,appointments.a_date,appointments.a_time,appointments.status,appointments.presence FROM appointments 
        INNER JOIN patients ON patients.id = appointments.patient_id
        INNER JOIN users ON patients.ci = users.ci 
        WHERE appointments.doctor_id = ('{$this->DocId}') AND appointments.presence = '1'
        ORDER BY appointments.a_date,appointments.a_time DESC;";
        $query = $this->db->query($sql);
        $result = $query->fetch_all();
        if(sizeof($result) !=0 ){
            $_SESSION['appointmentsLastList'] = $result;
        } else {
            $_SESSION['errors']['appointmentEmpty'] = "No hay ninguna cita registrada.";
        }
    }
    
    public function appointmentUpdate(){
        $sql = "UPDATE appointments SET status = '0', presence = '1' WHERE id = '{$this->appointmentId}'";
        $query = $this->db->query($sql);
        if(!$query){
            $_SESSION['errors']['cantDelete'] = "No se pudo actualizar la cita.";
        } else {
            $_SESSION['messComp'] = "Cita culminada correctamente.";
        }
    }
          
}