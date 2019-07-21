<?php

class ConsultaGrupos extends Controller{

	function __construct(){
		parent::__construct();

		$this->view->mensajeError = "";
	}

	function renderVista(){

		//obtener y pasar generaciones a la vista
		$generaciones = $this->model->getGeneraciones();
		$this->view->generaciones = $generaciones;

		//obtener y pasar grados a la vista
		$grupos = $this->model->getAllGrupos();
		$this->view->grupos = $grupos;



		$this->view->render('consultagrupos/index');
	}


	function verGrupo(){

		$generacion = $_POST['generacion'];
		$grupo = $_POST['grupo'];

		//convertir lo que recibimos de grupo en un arreglo seprandolo por °
		$grupo = explode("°", $grupo);
		//asignar el grado y nombre grupo
		$grado = $grupo[0];
		$nombreGrupo = $grupo[1];



		$alumnos = $this->model->getGrupo(['grado' => $grado,
										   'nombreGrupo' => $nombreGrupo,
										   'generacion' => $generacion]); 


		if(!empty($alumnos)){
			$this->view->alumnos = $alumnos;
		}else{
			$this->view->mensajeError = "El grupo ".$grado."°".$nombreGrupo." Generacion ".$generacion." no tiene alumnos aun.";
		}

		

		$this->renderVista();

	}
}

?>