<?php
$name = isset($_POST["name"]) ? $_POST["name"] : false;
$lastName = isset($_POST["lastname"]) ? $_POST["lastname"] : false;
$ci = isset($_POST["CI"]) ? $_POST["CI"] : false;
$email = isset($_POST["email"]) ? $_POST["email"] : false;
$password = isset($_POST["password"]) ? $_POST["password"] : false;

if(!$name || !$lastName || !$ci || !$email || !$password)
    header("Location: ../");

$ci = intval($ci);