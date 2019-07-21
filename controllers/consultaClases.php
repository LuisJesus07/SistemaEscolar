<?php

class ConsultaClases extends Controller{

	function __construct(){
		parent::__construct();

		$this->view->clases = "";
	}

	function renderVista(){

		$this->view->render('consultaclases/index');
	}

	function verClases(){

		$clases = $this->model->getAllClases();

		$this->view->clases = $clases;



		$this->renderVista();
	}
}

?>