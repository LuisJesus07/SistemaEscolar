<?php

class mainAlumno extends Controller{

	function __construct(){
		parent::__construct();
	}

	function renderVista(){

		$vistaCargar = 'mainalumno/index';
		$this->verificarSesionAlumno($vistaCargar);
	}
}

?>