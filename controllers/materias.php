<?php

class Materias extends Controller{

	function __construct(){
		parent::__construct();

		$this->view->mensajeError = "";
		$this->view->mensajeExito = "";
	}

	function renderVista(){

		//$this->view->render('materias/menu');
		$vistaCargar = 'materias/menu';
		$this->verificarUsuario($vistaCargar);
	}

	function renderRegistrarMateria(){

		//$this->view->render('materias/index');
		$vistaCargar = 'materias/index';
		$this->verificarUsuario($vistaCargar);
	}

	function renderRegistrarClases(){

		//obtener las materias disponible
		$materias = $this->model->getAllMaterias();
		$this->view->materias = $materias;

		//obtener todos los profesores 
		$maestros = $this->model->getAllMaestros();
		$this->view->maestros = $maestros;

		//$this->view->render('materias/clases');
		$vistaCargar = 'materias/clases';
		$this->verificarUsuario($vistaCargar);
	}


	function registarMateria(){

		$nombreMateria = $_POST['nombreMateria'];
		$gradoMateria = $_POST['gradoMateria'];

		if($this->model->insertMateria(['nombreMateria' => $nombreMateria,
										'gradoMateria' => $gradoMateria])){

			$this->view->mensajeExito = "Materia registrada con exito";

		}else{

			$this->view->mensajeError = "No se pudo registrar materia";

		}

		$this->renderRegistrarMateria();
	}

	function registrarClase(){

		$nombreMateria = $_POST['materiaClase'];
		$nombreMaestro = $_POST['maestroClase']; 

		//validar que el maestro no tenga asignada ya esa clase
		if($this->model->validarClases(['materiaClase' => $nombreMateria,
										'maestroClase' => $nombreMaestro]) == 1){

			$this->view->mensajeError = "El profesor ya tiene asignada esa clase";

		}

		if(empty($this->view->mensajeError)){

			if($this->model->insertClase(['materiaClase' => $nombreMateria,
									  'maestroClase' => $nombreMaestro])){

			$this->view->mensajeExito = "Clase registrada con exito";

			}else{
				$this->view->mensajeError = "No se pudo registrar la Clase";
			}

		}

		$this->renderRegistrarClases();

	}


}

?>