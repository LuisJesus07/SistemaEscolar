<?php

class InscribirAlumnoMateria extends Controller{

	function __construct(){
		parent::__construct();
		$this->view->mensajeExito = "";
		$this->view->mensajeError = "";
	}

	function renderVista(){

		//obtener clases
		$clases = $this->model->getClases();
		$this->view->clases = $clases;

		$this->view->render('inscribiralumnomateria/index');
	}

	function registrarAlumnoMateria(){

		$matricula = $_POST['matricula'];
		$clase = $_POST['clase'];

		//obtenemos el id del alumno 
		$idAlumno = $this->model->getIdAlumno(['matricula' => $matricula]);


		if($this->model->insertAlumnoMateria(['idAlumno' => $idAlumno,
											  'clase' => $clase])){

			$this->view->mensajeExito = "Alumno inscrito correctamente";

		}else{

			$this->view->mensajeError = "No se pudo inscribir al alumno";

		}

		$this->renderVista();
	}
}

?>