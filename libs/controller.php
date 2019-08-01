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


	//funcion para cargar una vista dependiendo del tipo de usuario (Asmin o alumno)
	function verificarUsuario($vistaCargar){

		session_start();
		include_once 'models/infocuenta.php';
		if(empty($_SESSION['infoCuenta'])){
			//si no hay sesion iniciada nos manda al login
			header("location:".constant('URL')."login/renderVista");
		}else{
			//el unserialize nos permite acceder a los atributos del objeto
			$infoCuenta = $_SESSION['infoCuenta'];
			$infoCuenta = unserialize($infoCuenta);

			//si el usuario es admin lo mandamos al main
			if($infoCuenta->privilegios == '1'){
				$this->view->render(''.$vistaCargar.'');
			}else{
				header("location:".constant('URL')."login/renderVista");
			}

		}
	}

}

?>