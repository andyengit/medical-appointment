<?php
class Views
{
    //VALIDACION  DE ENTRADAS DE PANTALLAS
    function getView($controller,$role, $view)
    {
        If($_SESSION['globalRol'] != $role){
            if($_SESSION['globalRol'] == 'User'){
                header("Location: ".base_url());  
            }else header("Location:".base_url().$_SESSION['globalRol']."/inicio");
        }else {
        $controller = get_class($controller);
        if ($controller == "User") {
            $view = 'views/'. $view . '.php';
        } else {
            $view = 'views/'. $controller . '/' . $view . '.php';
        }
        require_once ("views/layout/header.php");
        require_once ($view);
        require_once ("views/layout/footer.php");
        }
    }
}
