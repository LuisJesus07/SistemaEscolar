<?php

class Maestros extends Controller{


	function __construct(){

		parent::__construct();

		$this->view->mensajeError = "";
		$this->view->mensajeExito = "";
	}

	function renderVista(){

		$this->view->render('maestros/menu');
	}

	function renderRegistrarMaestro(){

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

		$mensajeError = "";
		$mensajeExito = "";

		if($this->model->insertMaestro(['matricula' => $matricula,
									    'nombre' => $nombre,
									    'apellidos' => $apellidos,
									    'direccion' => $direccion,
									    'telefono' => $telefono,
									    'nacimiento' => $nacimiento,
									    'sexo' => $sexo,])){

			$mensajeExito = "Maestro registrado con exito";

		}else{
			$mensajeError = "No se pudo registrar el maestro";
		}

		$this->view->mensajeError = $mensajeError;
		$this->view->mensajeExito = $mensajeExito;

		$this->renderRegistrarMaestro();

	}


}

?>
