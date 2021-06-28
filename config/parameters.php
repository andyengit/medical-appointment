<?php
//CONSTANTE DE RUTA PRINCIPAL
const BASE_URL = "http://localhost/proyecto/";

require_once ("config/database.php");

date_default_timezone_set("America/caracas");

$url = !empty($_GET['url']) ? $_GET['url'] : 'User/index';
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


