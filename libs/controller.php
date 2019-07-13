<?php

class Controller{

	function __construct(){

		//echo "<p>Clase padre Controlador</p>";

		$this->view = new View();
	}


	function cargarModelo($modelo){

		$url = 'models/'.$modelo.'model.php';


		if(file_exists($url)){

			require $url;

			$nombreModelo = $modelo.'Model';


			$this->model = new $nombreModelo();
		}



	}
}

?>