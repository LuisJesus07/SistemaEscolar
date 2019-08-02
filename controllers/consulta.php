<?php

class Consulta extends Controller{


	function __construct(){

		parent::__construct();

		$this->view->mensajeError = "";
		$this->view->mensajeExito = "";


	}

	function renderVista(){

		//asignamos a la variable alumnos todos los registros obtenidos de getAll
		$alumnos = $this->model->getAll();

		//le pasamos los registros a la vista
		$this->view->alumnos = $alumnos;

		//mando a llamr el metodo render de la clase view y le paso la vista a cargar
		$vistaCargar = 'consulta/index';
		$this->verificarUsuario($vistaCargar);
		//$this->view->render('consulta/index');
	}



	function verAlumno($param = null){

		include_once 'models/infocuenta.php';
		session_start();	
		$infoCuenta = $_SESSION['infoCuenta'];
		$infoCuenta = unserialize($infoCuenta);

		if($infoCuenta->privilegios == '2'){
			$matricula = $infoCuenta->matricula;
		}else{
			$matricula = $param[0];
		}



		$alumno = $this->model->getById($matricula);

		//mantener la matricula del alumno en caso de que el usuario lo cambie en la vista
		if(!isset($_SESSION)){
			session_start();
		}
		$_SESSION['idMatricula'] = $alumno->matricula;

		$this->view->alumno = $alumno;

		//verificar que este logeado un alumno o el admin
		$vistaCargar = 'consulta/detalle';
		$this->verificarSesion($vistaCargar);
		//$this->view->render('consulta/detalle');


	}


	function actualizarAlumno($param = null){

		//mantener la matricula del alumno en caso de que el usuario lo cambie en la vista
		session_start();
		$matricula =$_SESSION['idMatricula'];

		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$nacimiento = $_POST['nacimiento'];
		$sexo = $_POST['sexo'];
		$grupo = $_POST['grupo'];
		$generacion = $_POST['generacion'];


		//destruir la sesion
		unset($_SESSION['idMatricula']);

		if($this->model->update(['matricula' => $matricula,
								 'nombre' => $nombre,
								 'apellidos' => $apellidos,
								 'direccion' => $direccion,
								 'telefono' => $telefono,
								 'nacimiento' => $nacimiento,
								 'sexo' => $sexo,
								 'grupo' => $grupo,
								 'generacion' => $generacion])){



			$alumno = new Alumno();

			$alumno->matricula = $matricula;
			$alumno->nombre = $nombre;
			$alumno->apellidos = $apellidos;
			$alumno->direccion = $direccion;
			$alumno->telefono = $telefono;
			$alumno->nacimiento = $nacimiento;
			$alumno->sexo = $sexo;
			$alumno->grupo = $grupo;
			$alumno->generacion = $generacion;

			$this->view->alumno = $alumno;
			$mensajeExito = "Alumno Actualizado con exito";

		}else{
			$mensajeError = "No se pudo actualizar el alumno";
		}

		if(!empty($mensajeError)){
			$this->view->mensajeError = $mensajeError;
		}else{
			$this->view->mensajeExito = $mensajeExito;
		}
		

		$this->view->render('consulta/detalle');


	}


	function eliminarAlumno($param = null){

		$matricula = $param[0];

		if($this->model->delete($matricula)){
			//se elimino al alumno

			//$mensaje = "Alumno Eliminado";
			$mensaje = '<div class="error exito">Alumno eliminado correctamente</div>';
		}else{
			//no se pudo eliminar
			$mensaje = '<div class="error">No se ha podido eliminarb al alumno</div>';
		}

		echo $mensaje;


	}


	


}

?>