<?php

class Correos extends Controller{

	function __construct(){
		parent::__construct();
		$this->view->mensajeError = "";
		$this->view->mensajeExito = ""; 
	}


	function renderVista(){

		$vistaCargar = 'correos/menu';
		$this->verificarUsuario($vistaCargar);
	}

	function renderRegistrarCorreo(){

		$vistaCargar = 'correos/index';
		$this->verificarUsuario($vistaCargar);

	}

	function registrarCorreo(){

		$matricula = $_POST['matricula'];
		$correo = $_POST['correo'];
		$password = $_POST['password'];
		$privilegios = "2";

		//obtener el id del alumno a partir de la matricula
		if(!empty($this->model->getIdAlumno($matricula))){
			//si existe lo asignamos
			$idAlumno = $this->model->getIdAlumno($matricula);

			//validar que el correo que se va a ingresar no exista
			if($this->model->validarCorreo($correo) == 1){
				//$this->view->mensajeError = "El correo que ingreso ya existe. Pruebe con otro";
				$this->view->mensajeError = "Correo ya existente. Intente con otro";
			}else{

				//validar que el alumno aun no tenga correo
				if($this->model->validarAlumnoCorreo($idAlumno) == 1){
					$this->view->mensajeError = "El alumno con la matricula ".$matricula." ya tiene un correo asignado";
				}else{

					//guardar el correo
					if($this->model->insertCorreo(['correo' => $correo,
												   'password' => $password,
												   'privilegios' => $privilegios,
												   'idAlumno' => $idAlumno])){

						$this->view->mensajeExito = "Correo registrado con exito";
					}else{
						$this->view->mensajeError = "No se pudo registrar. Hubo un error";
					}

				}
				
			}

		}else{
			$this->view->mensajeError = "No existe el alumno con la matricula ".$matricula;
		}


		

		$this->renderRegistrarCorreo();
	}
}

?>