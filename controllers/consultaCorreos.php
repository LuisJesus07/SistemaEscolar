<?php

class ConsultaCorreos extends Controller{

	function __construct(){
		parent::__construct();
	}

	function renderVista(){

		//obtenemos los correos y se los pasamos a la vista
		$correos = $this->model->getAllCorreos();
		$this->view->correos = $correos;

		$vistaCargar = 'consultacorreos/index';
		$this->verificarUsuario($vistaCargar);


	}
}

?>