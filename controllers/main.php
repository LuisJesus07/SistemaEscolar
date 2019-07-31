<?php

class Main extends Controller{

	function __construct(){

		parent:: __construct();

		//echo "<p>Controlador Main</p>";



	}

	function renderVista(){

		session_start();
		include_once 'models/infocuenta.php';
		if(empty($_SESSION['infoCuenta'])){
			//si no hay sesion iniciada nos manda al login
			$this->view->render('login/index');
		}else{
			//el unserialize nos permite acceder a los atributos del objeto
			$infoCuenta = $_SESSION['infoCuenta'];
			$infoCuenta = unserialize($infoCuenta);
			$this->view->render('main/index');
			echo "Sesion iniciada de ".$infoCuenta->nombre;
		}



	}
}

?>