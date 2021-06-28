<?php
//CONSTANTE DE RUTA PRINCIPAL
const BASE_URL = "http://localhost/proyecto/";
//LLAMADO A LA BASE DE DATOS
require_once("config/database.php");
//DEFINIMOS TIEMPO DE VENEZUELA
date_default_timezone_set("America/caracas");

//CONFIGURACION URL CONTROLLADOR/METODO

$url = !empty($_GET['url']) ? $_GET['url'] : ($_SESSION['globalRol'] == 'User' ? "User/index" : $_SESSION['globalRol'] . "/inicio");
$arrUrl = explode("/", $url);
$controller = $arrUrl[0];
$method = $arrUrl[0];
$params = "";
if (!empty($arrUrl[1])) {
    if ($arrUrl[1] != "") {
        $method = $arrUrl[1];
    }
}

if (!empty($arrUrl[2])) {
    if ($arrUrl[1] != "") {
        for ($i = 2; $i < count($arrUrl); $i++) {
            $params .= $arrUrl[$i] . ',';
        }
        $params = trim($params, ',');
    }
}
