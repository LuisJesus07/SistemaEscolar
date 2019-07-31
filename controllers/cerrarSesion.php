<?php

class CerrarSesion extends Controller{

	function __construct(){
		parent::__construct();
	}

	function renderVista(){
		session_start();//Se reanuda la sesion iniciada
		session_destroy();//Se destruye la sesion iniciada

		$this->view->render('login/index');
	}
}

?>