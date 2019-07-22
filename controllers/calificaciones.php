<?php

class Calificaciones extends Controller{

	function __construct(){
		parent::__construct();
		$this->view->mensajeExito = "";
		$this->view->mensajeError = "";
	}

	function renderVista(){

		$this->view->render('calificaciones/menu');
	}

	function renderAlumnosMateria(){

		$this->view->render('calificaciones/index');
	}


	function verAlumnosMateria(){

		$generacion = $_POST['generacion'];
		$grado = $_POST['grado'];
		$nombreGrupo = $_POST['nombreGrupo'];
		$materia = $_POST['materia'];

		$alumnosMateria = $this->model->getAlumnosMateria(['generacion' => $generacion,
														   'grado' => $grado,
														   'nombreGrupo' => $nombreGrupo,
														   'materia' => $materia]);

		if(!empty($alumnosMateria)){

			$this->view->alumnosMateria = $alumnosMateria;

			//mandar los datos de la materia generacion etc
			$this->view->generacion = $generacion;
			$this->view->grado = $grado;
			$this->view->nombreGrupo = $nombreGrupo;
			$this->view->materia = $materia;


		}else{
			$this->view->mensajeError = "Este grupo no exite";
		}


		

		$this->renderAlumnosMateria();

	}



	function verAlumnoMateria($param = null){

		$idCalificacion = $param[0];
		$nombreAlumno = $param[1];

		$calificaciones = $this->model->getCalificacionesAlumno($idCalificacion);


		//datos del alumno para cambiar calificacopon
		$this->view->nombreAlumno = $nombreAlumno;
		$this->view->idCalificacion = $idCalificacion;

		$this->view->calificaciones = $calificaciones;


		$this->view->render('calificaciones/detalle');

	}

	function actualizarCalificaciones($param = null){

		$idCalificacion = $param[0];
		$nombreAlumno = $param[1];
		$primerBimestre = $_POST['primerBimestre'];
		$segundoBimestre = $_POST['segundoBimestre'];
		$tercerBimestre = $_POST['tercerBimestre'];
		$cuartoBimestre = $_POST['cuartoBimestre'];
		$quintoBimestre = $_POST['quintoBimestre'];

		if($this->model->updateCalificaciones(['idCalificacion' => $idCalificacion,
											   'primerBimestre' => $primerBimestre,
											   'segundoBimestre' => $segundoBimestre,
											   'tercerBimestre' => $tercerBimestre,
											   'cuartoBimestre' => $cuartoBimestre,
											   'quintoBimestre' => $quintoBimestre])){

			$calificacion = new Calificacion();

			$calificacion->idCalificacion = $idCalificacion;
			$calificacion->primerBimestre = $primerBimestre;
			$calificacion->segundoBimestre = $segundoBimestre;
			$calificacion->tercerBimestre = $tercerBimestre;
			$calificacion->cuartoBimestre = $cuartoBimestre;
			$calificacion->quintoBimestre = $quintoBimestre;


			$this->view->nombreAlumno = $nombreAlumno;			
			$this->view->calificaciones = $calificacion;

			$this->view->mensajeExito = "Se ha actualizado las calificaciones";

		}else{
			$this->view->mensajeError = "No se ha podido actualizar las calificaciones";
		}


		$this->view->render('calificaciones/detalle');
		
	}
}

?>