<?php
class CenterModel
{
    private $id;
    private $db;

    function __construct()
    {
        $this->db = Database::connect();
    }
}