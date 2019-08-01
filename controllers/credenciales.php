<?php

class Credenciales extends Controller{

	function __construct(){
		parent::__construct();
		$this->view->mensajeExito = "";
		$this->view->mensajeError = "";
	}

	function renderVista(){
		//$this->view->render('credenciales/menu');
		$vistaCargar = 'credenciales/menu';
		$this->verificarUsuario($vistaCargar);
	}

	function renderRegistrar(){
		//$this->view->render('credenciales/index');
		$vistaCargar = 'credenciales/index';
		$this->verificarUsuario($vistaCargar);
	}

	function registrarCredencial(){

		$matricula = $_POST['matricula'];
		$firma = $_POST['firma'];

		$rutaFoto = $_FILES['rutaFoto']['name'];//Se guarda el nombre de la imagen
		$sizeImagen = $_FILES['rutaFoto']['size'];//tamaño de la img
		$typeImagen = $_FILES['rutaFoto']['type'];//tipo de archivo

		//validar que el alumno no tenga una credencial ya asignada
		if($this->model->validarCredencial($matricula) == 1){
			$this->view->mensajeError = "El alumno con la matricula ".$matricula." ya tiene credencial";
		}

		if(empty($this->view->mensajeError)){

			if($sizeImagen <=5000000){

			if ($typeImagen == "image/jpeg" || $typeImagen == "image/jpg" || $typeImagen == "image/png"){
				//ruta de la carpeta en el servidor
				$carpeta_destino = $_SERVER['DOCUMENT_ROOT']. constant('IMG_RUTA');

				//mover la imagen del directori temporal al directorio elegido
				move_uploaded_file($_FILES['rutaFoto']['tmp_name'],$carpeta_destino.$rutaFoto);

			}else{
				$this->view->mensajeError = "Imagen no compatible";
			}

			}else{
				$this->view->mensajeError = "Imagen muy pesada";
			}

			//obtener id del alumno mediante la matricula
			$idAlumno = $this->model->getIdAlumno($matricula);

			

		
			if($this->model->insertCredencial(['idAlumno' => $idAlumno,
											   'rutaFoto' => $rutaFoto,
											   'firma' => $firma])){

				$this->view->mensajeExito = "Se ha registrado una credencial";

			}else{
				$this->view->mensajeError = "No se ha podido registrar";
			}

		}

		
	
		$this->renderRegistrar();

	}
}

?>
