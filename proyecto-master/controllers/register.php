<?php
session_start();
$errors = false;
$nameErr = $lastNameErr = $ciErr = $emailErr = $passwordErr = "";
$name = $lastName = $ci = $email = $password = "";

if($_SERVER["REQUEST_METHOD"] != "POST")
    header("Location: ..");

#Validation for name and last name
if(empty($_POST["name"])) {
    $nameErr = "Debe ingresar su nombre.";
    $errors = true;
}else
    $name = testInput($_POST["name"]);

if(empty($_POST["lastname"])) {
    $lastNameErr = "Debe ingresar su apellido.";
    $errors = true;
}else 
    $lastName = testInput($_POST["lastname"]);

if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
    $nameErr = "Introduzca solamente letras y espacios.";
    $errors = true;
}
if (!preg_match("/^[a-zA-Z-' ]*$/", $lastName)){
    $lastNameErr = "Introduzca solamente letras y espacios.";
    $errors = true;
}

#Validation for CI
if(empty($_POST["CI"])) {
    $ciErr = "Debe ingresar su número de cedula.";
    $errors = true;
}else
    $ci = testInput($_POST["CI"]);

if(!preg_match("/^[0-9]*$/", $ci) || strlen($ci) < 6 || strlen($ci) > 8) {
    $ciErr = "Debe ingresar un número de cedula válido.";
    $errors = true;
}
    
#Validation for email
if(empty($_POST["email"])) {
    $emailErr = "Debe ingresar su correo electrónico.";
    $errors = true;
}else
    $email = testInput($_POST["email"]);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "El texto introducido no es una dirección valida de email.";
    $errors = true;
} 
    
#Validation for password
if(empty($_POST["password"])) {
    $passwordErr = "Debe ingresar una contraseña.";
    $errors = true;
}
else
    $password = testInput($_POST["password"]);

if(strlen($password) < 6) {
    $passwordErr = "La contraseña debe contener al menos 6 caracteres.";
    $errors = true;
}
    
#Setting session variables for errors
$_SESSION["nameErr"] = $nameErr;
$_SESSION["lastNameErr"] = $lastNameErr;
$_SESSION["ciErr"] = $ciErr;
$_SESSION["emailErr"] = $emailErr;
$_SESSION["passwordErr"] = $passwordErr;

#Setting session variables for the input values
$_SESSION["name"] = $name;
$_SESSION["lastName"] = $lastName;
$_SESSION["ci"] = $ci;
$_SESSION["email"] = $email;

$_SESSION["register"] = !$errors;

header("Location: ..");

function testInput(string $data) : string {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}