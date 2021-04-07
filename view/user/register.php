<?php
$nameErr = $lastNameErr = $ciErr = $emailErr = $passwordErr = "";
$name = $lastName = $ci = $email = $password = "";

if($_SERVER["REQUEST_METHOD"] != "POST")
    header("Location: ../..");

if(empty($name))
    $nameErr = "Debe ingresar su nombre.";
else
    $name = testInput($_POST["name"]);

if(empty($lastName))
    $lastNameErr = "Debe ingresar su apellido.";
else 
    $lastName = testInput($_POST["lastname"]);

if(empty($ci))
    $ciErr = "Debe ingresar su número de cedula.";
else
    $ci = testInput($_POST["CI"]);

if(empty($email))
    $emailErr = "Debe ingresar su correo electrónico.";
else
    $email = testInput($_POST["email"]);

if(empty($password))
    $passwordErr = "Debe ingresar una contraseña.";
else
    $password = testInput($_POST["password"]);

    
function testInput(string $data) : string {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}