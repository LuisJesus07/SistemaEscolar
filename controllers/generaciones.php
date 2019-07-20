<?php

class Generaciones extends Controller{

	function __construct(){
		parent::__construct();

		$this->view->mensajeError = "";
		$this->view->mensajeExito = "";
	}

	function renderVista(){

		$this->view->render('generaciones/index');
	}


	function agregarGeneracion(){

		$generacion = $_POST['generacion'];

		$mensajeError = "";
		$mensajeExito = "";

		if($this->model->insertGeneracion($generacion)){

			$mensajeExito = "Generacion agregada con exito";

		}else{

			$mensajeError = "No se pudo agregar generacion";
		}

		$this->view->mensajeError = $mensajeError;
		$this->view->mensajeExito = $mensajeExito;

		$this->renderVista();
	}
}

?>