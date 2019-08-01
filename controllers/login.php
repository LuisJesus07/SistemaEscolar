<?php

class Login extends Controller{

	function __construct(){
		parent::__construct();
		$this->view->mensajeError = "";
	}

	function renderVista(){
		$this->view->render('login/index');
	}

	function iniciarSesion(){

		$correo = $_POST['correo'];
		$password = $_POST['password'];

		//verificamos que exista un usuario con ese correo y contaseña
		if($this->model->verificarUsuario(['correo' => $correo,
										   'password' => $password]) != null){

			//si existe un usuario con esa contra y correo obtenemos el tipo de usuario que es(Alumno o admin)
			$privilegios = $this->model->verificarUsuario(['correo' => $correo,
										   'password' => $password]);

			
			//dependiendo del tipo de usuario obtenemos la ind¿formacion
			switch ($privilegios['privilegios']) {
						case '1':
							//si es 1 obtenemos la info del admin;
							$administrador = $this->model->getInfoAdmin($privilegios['idAdministrador']);
							//mandamos al main admin
							header("location:".constant('URL')."main");
							break;
						case '2':
							//si es 2 obtenemos la info del alumno;
							$alumno = $this->model->getInfoAlumno($privilegios['idAlumno']);
							//mandamos al mainalumno
							header("location:".constant('URL')."mainalumno");
							break;
						default:
							echo "no existe";
							break;
			}		


		}else{
			//en caso de no existir mostramos mensaje
			$this->view->mensajeError = "El usuario o la contraseña son incorrectos";
			$this->renderVista();
		}

		
	}
}

?>