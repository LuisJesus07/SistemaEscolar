<?php

class ConsultaCalificaciones extends Controller{

	function __construct(){
		parent::__construct();
		$this->view->mensajeError = "";
	}

	function renderVista(){

		$vistaCargar = 'consultacalificaciones/index';
		$this->verificarUsuario($vistaCargar);
		//$this->view->render('consultacalificaciones/index');
	}

	function verCalificaciones(){

		$matricula = $_POST['matricula'];

		$calificaciones = $this->model->getCalificaciones(['matricula' => $matricula]);

		if(!empty($calificaciones)){
			$this->view->calificaciones = $calificaciones;
		}else{
			$mensajeError = "El alumno con la matricula ".$matricula." no existe o aun no tiene calificaciones asignadas.";
			$this->view->mensajeError = $mensajeError;
		}
		

		$this->renderVista();

		
	}
}

?>