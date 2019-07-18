<?php

class Generaciones extends Controller{

	function __construct(){
		parent::__construct();

		$this->view->mensaje = "";
	}

	function renderVista(){

		$this->view->render('generaciones/index');
	}


	function agregarGeneracion(){

		$generacion = $_POST['generacion'];

		$mensaje = "";

		if($this->model->insertGeneracion($generacion)){

			$mensaje = "Generacion agregada con exito";

		}else{

			$mensaje = "no se pudo agregar generacion";
		}

		$this->view->mensaje = $mensaje;

		$this->renderVista();
	}
}

?>