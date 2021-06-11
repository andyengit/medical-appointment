<?php

require_once "autoload.php";
require_once "config/db.php";
require_once "config/parameters.php";
require_once "views/layout/header.php";

if(isset($_GET["controller"])) 
    $controllerName = $_GET["controller"]."Controller";
else {
    require_once "views/index.php";
    require_once "views/layout/footer.php";
    exit();
}

//class_exists toma un string como parametro, si la clase existe devuelve true, sino devuelve false
if(class_exists($controllerName)) {
    $controller = new $controllerName();

    //method_exists toma dos parametros, el primero el nombre deuna clase 
    //y el segundo el nombre de un metodo
    //devuelve true si el metodo existe en la clase, sino devuelve false
    if(isset($_GET["action"]) && method_exists($controller, $_GET["action"])) {
        $action = $_GET["action"];
        $controller->$action();
    }else {
        echo "La página que buscas no existe."; 
        //TODO
        //Vista de error para mostrar de manera estilizada que la página no existe
        //Y así evitar poner solamente texto
    }
}else {
    echo "La página que buscas no existe.";
}
    
require_once "views/layout/footer.php";
