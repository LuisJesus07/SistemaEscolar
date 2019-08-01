<?php

class Maestros extends Controller{


	function __construct(){

		parent::__construct();

		$this->view->mensajeError = "";
		$this->view->mensajeExito = "";
	}

	function renderVista(){

		//$this->view->render('maestros/menu');
		$vistaCargar = 'maestros/menu';
		$this->verificarUsuario($vistaCargar);
	}

	function renderRegistrarMaestro(){

		//$this->view->render('maestros/index');
		$vistaCargar = 'maestros/index';
		$this->verificarUsuario($vistaCargar);
	}




	function registrarMaestro(){

		$matricula = $_POST['matricula'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$nacimiento = $_POST['nacimiento'];
		$sexo = $_POST['sexo'];

		$mensajeError = "";
		$mensajeExito = "";
		//expresion regular
		$soloLetras = '/^[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?)*$/';

		//validar fecha de nacimiento
		$nacimiento = explode("-", $nacimiento);
		if (empty($nacimiento[0])) {
			$mensajeError .="Ingrese una fecha de nacimiento <br>";
		}elseif ($nacimiento[0] > date('Y')) {
			$mensajeError .="El año no puede ser mayor al actual <br>";
		}elseif ($nacimiento[1] > date('m')) {
			$mensajeError .="La fecha no puede ser posterioro al mes actual <br>";
		}elseif ($nacimiento[2] > date('d')) {
			$mensajeError .="La fecha no pude ser posterior al dia actual <br>";
		}else{
			$nacimiento = $nacimiento[0] ."-". $nacimiento[1]."-".$nacimiento[2];
		}

		
		//validar la matricula
		if(empty($matricula)){
			$mensajeError .="Ingrese la matricula <br>";
		}elseif (strlen($matricula) > 10) {
			$mensajeError .="La matricula no debe de superar los 10 digitos <br>";
		}elseif (!is_numeric($matricula)) {
			$mensajeError .="La matricula solo puede contener numeros <br>";
		}

		//validar nombre
		if(empty($nombre)){
			$mensajeError .="Ingrese el nombre <br>";
		}elseif (strlen($nombre)> 70) {
			$mensajeError .="El nombre es demasiado largo <br>";
		}elseif (preg_match($soloLetras, $nombre)) {
			$nombre = trim($nombre);
		}else{
			$mensajeError .="El nombre solo debe de contener letras <br>";
		}

		//validar apellidos
		if(empty($apellidos)){
			$mensajeError .="Ingrese el apellido <br>";
		}elseif (strlen($apellidos)> 70) {
			$mensajeError .="El apellido es demasiado largo <br>";
		}elseif (preg_match($soloLetras, $apellidos)) {
			$apellidos = trim($apellidos);
		}else{
			$mensajeError .="El apellido solo debe de contener letras <br>";
		}

		//validar telefono
		if(empty($telefono)){
			$mensajeError .="Ingrese el telefono <br>";
		}elseif (strlen($telefono) >10) {
			$mensajeError .="El telefono no debe de superar los 10 digitos <br>";
		}elseif(!is_numeric($telefono)){
			$mensajeError .="El telefono solo debe de contener numeros <br>";
		}

		//validar direccion
		if(empty($direccion)){
			$mensajeError .="Ingrese una direccion <br>";
		}elseif (strlen($direccion) > 140) {
			$mensajeError .="Direccion muy larga <br>";
		}


		//validar sexo
		if ($sexo==1 || $sexo==2 ){
		}else{
			$mensajeError .="Ingrese un sexo valido <br>";
		}

		if(empty($mensajeError)){

			if($this->model->insertMaestro(['matricula' => $matricula,
									    'nombre' => $nombre,
									    'apellidos' => $apellidos,
									    'direccion' => $direccion,
									    'telefono' => $telefono,
									    'nacimiento' => $nacimiento,
									    'sexo' => $sexo,])){

			$mensajeExito = "Maestro registrado con exito";

			}else{
				$mensajeError = "No se pudo registrar el maestro. Ya existe esa matricula";
			}

		}else{
			//si hay algun error envamos la informacion de nuevo a la vista
			$this->view->matricula = $matricula;
			$this->view->nombre = $nombre;
			$this->view->apellidos = $apellidos;
			$this->view->direccion = $direccion;
			$this->view->telefono = $telefono;
		}
		

		

		$this->view->mensajeError = $mensajeError;
		$this->view->mensajeExito = $mensajeExito;

		$this->renderRegistrarMaestro();

	}


}

?>
