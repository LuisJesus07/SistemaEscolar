<?php

class Main extends Controller{

	function __construct(){

		parent:: __construct();

		//echo "<p>Controlador Main</p>";



	}

	function renderVista(){

		$vistaCargar = 'main/index';
		$this->verificarUsuario($vistaCargar);

	}
}

?>