<?php

class Materias extends Controller{

	function __construct(){
		parent::__construct();

		$this->view->mensajeError = "";
		$this->view->mensajeExito = "";
	}

	function renderVista(){

		$this->view->render('materias/menu');
	}

	function renderRegistrarMateria(){

		$this->view->render('materias/index');
	}

	function renderRegistrarClases(){

		//obtener las materias disponible
		$materias = $this->model->getAllMaterias();
		$this->view->materias = $materias;

		//obtener todos los profesores 
		$maestros = $this->model->getAllMaestros();
		$this->view->maestros = $maestros;

		$this->view->render('materias/clases');
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

		$this->view->render('materias/index');
	}

	function registrarClase(){

		$nombreMateria = $_POST['materiaClase'];
		$nombreMaestro = $_POST['maestroClase']; 


		if($this->model->insertClase(['materiaClase' => $nombreMateria,
									  'maestroClase' => $nombreMaestro])){

			$this->view->mensajeExito = "Materia registrada con exito";

		}else{
			$this->view->mensajeError = "No se pudo registrar la materia";
		}


		$this->renderRegistrarClases();

	}


}

?>