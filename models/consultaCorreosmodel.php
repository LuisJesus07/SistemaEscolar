<?php
include_once 'models/alumno.php';

class ConsultaCorreosModel extends Model{

	function __construct(){
		parent::__construct();
	}

	function getAllCorreos(){

		$alumnos = [];

		try{

			$query = $this->db->connect()->query('SELECT ALU.matricula,ALU.nombre, ALU.apellidos,CORR.correo
				FROM alumnos AS ALU
				INNER JOIN correos AS CORR ON CORR.idAlumno=ALU.idAlumno
				WHERE CORR.privilegios="2"');

			while($row = $query->fetch()){
				$alumno = new Alumno();

				$alumno->matricula = $row['matricula'];
				$alumno->nombre = $row['nombre'];
				$alumno->apellidos = $row['apellidos'];
				$alumno->correo = $row['correo'];

				array_push($alumnos, $alumno);
			}

			return $alumnos;

		}catch(PDOException $e){
			return false;
		}

	}


}

?>