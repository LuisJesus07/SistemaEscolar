<?php

class MiCuenta extends controller{

	function __construct(){
		parent::__construct();
		$this->view->mensajeError = "";
		$this->view->mensajeExito = "";
	}

	function renderVista(){
		$vistaCargar = 'micuenta/index';

		$this->verificarSesionAlumno($vistaCargar);
	}

	function actualizarPassword($param = null){

		$correo = $param[0];
		$passwordActual = $_POST['passwordActual'];
		$passwordNueva1 = $_POST['passwordNueva1'];
		$passwordNueva2 = $_POST['passwordNueva2'];

		//verificar que la contraseña actual esta bien
		if($this->model->verificarPasswordActual(['correo' => $correo,
												  'passwordActual' => $passwordActual]) == 1){

			if($passwordNueva1 == $passwordNueva2){

				//obtenemos el id del alumno a partir de su correo
				$idAlumno = $this->model->getIdAlumno($correo);

				//actualizar la contraseña
				if($this->model->updatePassword(['password' => $passwordNueva1,
											  'idAlumno' => $idAlumno])){

					$this->view->mensajeExito = "Contraseña actualizada correctamente";

				}


			}else{
				$this->view->mensajeError = "La nueva contraseña debe ser igual en los dos campos";
			}

		}else{
			$this->view->mensajeError = "Contraseña actual incorrecta";
		}

		


		$this->renderVista();
	}



}

?>