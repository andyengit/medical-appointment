<?php
session_start();
require_once "controllers/viewController.php";
require_once "models/viewModel.php";
require_once "VARS.php";
require_once "view/head.php";

$mvc = new viewController();
$mvc->changeView();

require_once "view/foot.php";
?>

//ESTO ES UN COMENTARIO