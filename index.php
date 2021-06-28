<?php
session_start();
if(!isset($_SESSION['logIn'])){
    $_SESSION['globalRol'] = 'User';
    $_SESSION['logIn'] = false;
}
require_once ("config/parameters.php");
require_once ("helpers/helpers.php");
require_once ("libraries/core/autoload.php");
require_once ("libraries/core/load.php");
