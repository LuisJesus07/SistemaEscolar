<?php

class InscribirAlumnoMateria extends Controller{

	function __construct(){
		parent::__construct();
		$this->view->mensajeExito = "";
		$this->view->mensajeError = "";
	}

	function renderVista(){

		//obtener generaciones
		$generaciones = $this->model->getGeneraciones();
		$this->view->generaciones = $generaciones;


		//obtener grupos
		$grupos = $this->model->getGrupos();
		$this->view->grupos = $grupos;

		//obtener clases
		$clases = $this->model->getClases();
		$this->view->clases = $clases;

		$this->view->render('inscribiralumnomateria/index');
	}

	function registrarAlumnoMateria(){

		$generacion = $_POST['generacion'];
		$grupo = $_POST['grupo'];
		$clase = $_POST['clase'];

		$grupo = explode("°", $grupo);

		$grado = $grupo[0];
		$nombreGrupo = $grupo[1];


		//validar que un grupo no se pueda inscribir dos veces en una misma materia
		if($this->model->validarAlumnosMateria(['generacion' => $generacion,
												'grado' => $grado,
												'nombreGrupo' => $nombreGrupo,
												'clase' => $clase]) >= 1){

			$this->view->mensajeError = "El grupo ya esta inscrito a esa clase";

		}

		if(empty($this->view->mensajeError)){

			//obtenemos el id de todos los alumnos del grupo seleccionado
			$idAlumnos = $this->model->getAllIdAlumnos(['generacion' => $generacion,
														'grado' => $grado,
														'nombreGrupo' => $nombreGrupo]);



			include_once 'models/idAlumno.php';
			//recorremos el arreglo de objetos idAlumnos e inscribimos a tosdos los alumnos del grupo a la clase seleccionada
			foreach($idAlumnos as $row) {
				$idAlumno = new IdAlumno();
				$idAlumno = $row;

				if($this->model->insertAlumnoMateria(['idAlumno' => $idAlumno->idAlumno,
												  'clase' => $clase])){

					$this->view->mensajeExito = "Grupo inscrito correctamente a la clase";

				}else{
					$this->view->mensajeError = "No se pudo inscribir el grupo a la clase";
				}
				
			}

		}


		




		$this->renderVista();
	}
}

?>