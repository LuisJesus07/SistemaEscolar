<?php

class Maestros extends Controller{


	function __construct(){

		parent::__construct();

		$this->view->mensaje = "";
	}

	function renderVista(){

		$this->view->render('maestros/index');
	}




	function registrarMaestro(){

		$matricula = $_POST['matricula'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$nacimiento = $_POST['nacimiento'];
		$sexo = $_POST['sexo'];

		$mensaje = "";

		if($this->model->insertMaestro(['matricula' => $matricula,
									    'nombre' => $nombre,
									    'apellidos' => $apellidos,
									    'direccion' => $direccion,
									    'telefono' => $telefono,
									    'nacimiento' => $nacimiento,
									    'sexo' => $sexo,])){

			$mensaje = "Maestro registrado con exito";

		}else{
			$mensaje = "No se pudo registrar el maestro";
		}

		$this->view->mensaje = $mensaje;

		$this->renderVista();

	}


}

?>