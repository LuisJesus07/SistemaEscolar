<?php

class Consulta extends Controller{


	function __construct(){

		parent::__construct();


	}

	function renderVista(){

		//asignamos a la variable alumnos todos los registros obtenidos de getAll
		$alumnos = $this->model->getAll();

		//le pasamos los registros a la vista
		$this->view->alumnos = $alumnos;

		//mando a llamr el metodo render de la clase view y le paso la vista a cargar
		$this->view->render('consulta/index');
	}


	


}

?>