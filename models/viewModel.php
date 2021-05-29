<?php
require_once "VARS.php";
class viewModel{
    public function changeViewModel($link){
        if($link == "nosotros" ||$link == "login" || $link == "registro"){
            $modulo = "view/modulos/". $link .".php";
        } else if($link == "inicio"){
            $modulo = "view/modulos/inicio.php";
        }
        return $modulo;
    }
}

?>