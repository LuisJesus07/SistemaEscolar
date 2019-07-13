<?php
include_once 'models/alumno.php';

class ConsultaModel extends Model{

	function __construct(){

		parent::__construct();
	}

	function getAll(){

		$alumnos = [];

		try{

			$query = $this->db->connect()->query('SELECT * FROM alumnos'); 

			while($row = $query->fetch()){
				$alumno = new Alumno();

				$alumno->matricula = $row['matricula'];
				$alumno->nombre = $row['nombre'];
				$alumno->apellidos = $row['apellidos'];
				$alumno->direccion = $row['direccion'];
				$alumno->telefono = $row['telefono'];
				$alumno->nacimiento = $row['nacimiento'];
			 	$alumno->sexo = $row['idSexo'];
				$alumno->generacion = $row['idGeneracion'];
				$alumno->grupo = $row['idGrupo']; 

				array_push($alumnos, $alumno);
			}

			return $alumnos;

		}catch(PDOException $e){

			return [];
		}
	}





}

?>