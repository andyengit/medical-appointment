<?php
//CONEXION CON BASE DE DATOS
class Database {
    public static function connect() {
        $db = new mysqli("localhost", "admin", "", "revemed");
        $db->query("SET NAMES 'UTF8'");
        return $db;
    }
}