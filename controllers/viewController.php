<?php
class viewController{
    public function changeView(){
        if(isset($_GET["go"])){
            $change = $_GET["go"];
        } else {
            $change = "inicio";
        }
        $resultado = new viewModel();
        include $resultado->changeViewModel($change);;
    }
}

?>