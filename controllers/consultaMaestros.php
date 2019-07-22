<?php

class ConsultaMaestros extends Controller{

	function __construct(){
		parent::__construct();

		$this->view->mensajeError = "";
		$this->view->mensajeExito = "";
	}

	function renderVista(){

		//guardar en una variable el arreglo con todos los maestros
		$maestros = $this->model->getAll();

		//pasarle a la vista los maestros
		$this->view->maestros = $maestros;

		$this->view->render('consultamaestros/index');
	}


	function verMaestro($param = null){

		$matricula = $param[0];

		$maestro = $this->model->getById($matricula);

		session_start();
		$_SESSION['idMatricula'] = $maestro->matricula;

		$this->view->maestro = $maestro;

		$this->view->render('consultamaestros/detalle');

	}


	function actualizarMaestro($param = null){

		session_start();
		$matricula =$_SESSION['idMatricula'];

		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$nacimiento = $_POST['nacimiento'];
		$sexo = $_POST['sexo'];

		//destruir la sesion
		unset($_SESSION['idMatricula']);

		if($this->model->updateMaestro(['matricula' => $matricula,
									    'nombre' => $nombre,
									    'apellidos' => $apellidos,
									    'direccion' => $direccion,
									    'telefono' => $telefono,
									    'nacimiento' => $nacimiento,
									    'sexo' => $sexo,])){

			$maestro = new Maestro();

			$maestro->matricula = $matricula;
			$maestro->nombre = $nombre;
			$maestro->apellidos = $apellidos;
			$maestro->direccion = $direccion;
			$maestro->telefono = $telefono;
			$maestro->nacimiento = $nacimiento;
			$maestro->sexo = $sexo;

			$this->view->maestro = $maestro;

			$mensajeExito = "Maestro actualizado correctamente";

		}else{
			$mensajeError = "No se pudo actualizar al maestro";
		}

		if(!empty($mensajeError)){
			$this->view->mensajeError = $mensajeError;
		}else{
			$this->view->mensajeExito = $mensajeExito;
		}


		$this->view->render('consultamaestros/detalle');
	}



	function eliminarMaestro($param = null){

		$matricula = $param[0];

		$mensaje = "";

		if($this->model->deleteMaestro($matricula)){

			$mensaje = "Maestro eliminado correctamente";
		}else{
			$mensaje = "No se pudo eliminar al maestro";
		}

		echo $mensaje;


	}





}

?>