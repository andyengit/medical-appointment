<?php

require_once "autoload.php";

if(isset($_GET["controller"])) 
    $controllerName = $_GET["controller"]."Controller";
else {
    echo "La página que buscas no existe.";
    exit();
}

if(class_exists($controllerName)) {
    $controller = new $controllerName();

    if(isset($_GET["action"]) && method_exists($controller, $_GET["action"])) {
        $action = $_GET["action"];
        $controller->$action();
    }else {
        echo "La página que buscas no existe.";
    }
}else {
    echo "La página que buscas no existe.";
}
    