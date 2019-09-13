<?php	

class ConsultaCalificaciones extends Controller{

	function __construct(){
		parent::__construct();
		$this->view->mensajeError = "";
	}

	function renderVista(){

		//verificar que este logeado un alumno o el admin
		//$vistaCargar = 'ConsultaCalificaciones/index';
		//$this->verificarSesion($vistaCargar);
		$this->view->render('consultacalificaciones/index');
	}

	function verCalificaciones(){

		include_once 'models/infocuenta.php';
		session_start();	
		$infoCuenta = $_SESSION['infoCuenta'];
		$infoCuenta = unserialize($infoCuenta);

		//si hay una sesion de alumno abierta le asignamos la matricula del objeto sesion a $matricula
		if($infoCuenta->privilegios == '2'){
			$matricula = $infoCuenta->matricula;
		}else{
			//si no lo recibimos por POST
			$matricula = $_POST['matricula'];
		}


		$calificaciones = $this->model->getCalificaciones(['matricula' => $matricula]);

		if(!empty($calificaciones)){
			$this->view->calificaciones = $calificaciones;
		}else{
			$mensajeError = "El alumno con la matricula ".$matricula." no existe o aun no tiene calificaciones asignadas.";
			$this->view->mensajeError = $mensajeError;
		}
		

		$this->renderVista();

		
	}
}

?>