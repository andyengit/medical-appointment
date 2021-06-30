<?php
class CenterModel
{
    private $id;
    private $db;
    private $password;

    function __construct()
    {
        $this->db = Database::connect();
    }
    
    function setPassword($password) {
        $this->password = $password;
    }

    function login() {
        $reditect = "Location:" . base_url() . "user/login";

        $query = "SELECT * FROM center_admin WHERE id = 1" ;
        $result = $this->db->query($query);
        $rows = $result->fetch_assoc();

        if($this->password == $rows["password"]) {
            $_SESSION["globalRol"] = "Center";
            $_SESSION["globalId"] = 1;
            $_SESSION["globalCi"] = 1;

            $reditect = "Location:" . base_url() . "center/registerSpeciality";
        }

        return $reditect;
    }
}