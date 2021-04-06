<?php

class MvcController{

	public function plantilla(){

		include "view/template.php";
	}

	public function enlaces(){

		if(isset($_GET["go"])){
			$enlace = $_GET["go"];
		} 
		else {
			$enlace = "index";
		}		

		$i = new MvcModels();
		$resultado = $i->enlacesM($enlace);

		include $resultado;
	}
}
?>