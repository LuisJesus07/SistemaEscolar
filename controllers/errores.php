<?php

class Errores extends Controller{

	function __construct(){

		parent:: __construct();

		//echo "<p>Error: El controlador que desa cargar no existe</p>";

		
	}

	function renderVista(){

		$this->view->render('errores/index');
	}
}

?>