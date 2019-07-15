<?php

class Registrar extends Controller{

	function __construct(){

		parent:: __construct();

		$this->view->mensaje = "";

		


	}

	function renderVista(){

		//obtener los grupos para el CB
		$grupos = $this->model->getGrupos();
		//pasarle los grupos a la vista
		$this->view->grupos = $grupos;


		//obtener las generaciones para el CB
		$generaciones = $this->model->getGeneraciones();
		//pasarle las generaciones a la vista
		$this->view->generaciones = $generaciones;

		$this->view->render('registrar/index');



	}

	function registrarAlumno(){

		//recicbimos los datos enviados de la vista
		$matricula = $_POST['matricula'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$nacimiento = $_POST['nacimiento'];
		$sexo = $_POST['sexo'];
		$grupo = $_POST['grupo'];
		$generacion = $_POST['generacion'];

		$mensaje = "";

		if($this->model->insertAlumno(['matricula'  => $matricula,
									'nombre'     => $nombre,
									'apellidos'  => $apellidos,
									'direccion'  => $direccion,
									'telefono'   => $telefono,
									'nacimiento' => $nacimiento,
									'sexo'       => $sexo,
									'grupo'      => $grupo,
									'generacion' => $generacion])  ){

			$mensaje = "Alumno ingresado con exito";
			


		}else{

			$mensaje = "Error al ingresar el alumno";

		}

		$this->view->mensaje = $mensaje;

		$this->renderVista();


		

	}



	
}

?>