<?php
//Todo este archivo lo que hace es crear una función encargada de cargar automaticamente
//todos los controladores en el index, para asi poder trabajar con ellos de una vez
//Y no tener que añadir mil quinientas lineas con includes

function controllers_autoload($className) {
    include "controllers/" . $className . ".php";
}

spl_autoload_register("controllers_autoload");