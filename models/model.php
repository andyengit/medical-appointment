<?php 
class MvcModels{
	public function enlacesM($enlace){

		if($enlace == "reservar" ||
			$enlace == "examenes" ||
			$enlace == "resultados" ||
			$enlace == "nosotros"){

			$modulo = "view/modulos/".$enlace.".php";
		} else if($enlace == "index"){
			$modulo = "view/modulos/inicio.php";
		} else {
			$modulo = "view/modulos/inicio.php";
		}

		return $modulo;

	}
}


 ?>