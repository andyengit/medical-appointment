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
        $query = "SELECT * FROM center WHERE id = 1" ;
    }
}