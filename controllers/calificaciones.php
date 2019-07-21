<?php

class Calificaciones extends Controller{

	function __construct(){
		parent::__construct();
	}

	function renderVista(){

		$this->view->render('calificaciones/menu');
	}
}

?>