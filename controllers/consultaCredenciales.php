<?php

class consultaCredenciales extends Controller{

	function __construct(){
		parent::__construct();
		$this->view->mensajeError = "";
	}

	function renderVista(){
		//$this->view->render('consultaCredenciales/index');
		$vistaCargar = 'consultaCredenciales/index';
		$this->verificarUsuario($vistaCargar);
	}

	function verCredencial(){

		$matricula = $_POST['matricula'];

		$credencial = $this->model->getInfoCredencial($matricula);

		if($credencial == null){
			$this->view->mensajeError = "El alumno con la matricula ".$matricula." no tiene credencial";
		}

		$this->view->credencial = $credencial;

		$this->renderVista();


	}
}

?>