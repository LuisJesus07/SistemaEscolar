<?php

class ConsultaGrupos extends Controller{

	function __construct(){
		parent::__construct();
	}

	function renderVista(){

		$this->view->render('consultagrupos/index');
	}


	function verGrupo(){

		$grado = $_POST['grado'];
		$nombreGrupo = $_POST['nombreGrupo'];


		$alumnos = $this->model->getGrupo(['grado' => $grado,
								'nombreGrupo' => $nombreGrupo]); 


		$this->view->alumnos = $alumnos;

		$this->view->render('consultagrupos/index');

	}
}

?>