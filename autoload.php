<?php

function controllers_autoload($className) {
    include "controllers/" . $className . ".php";
}

spl_autoload_register("controllers_autoload");