<?php
include_once 'models/alumno.php';

class ConsultaModel extends Model{

	function __construct(){

		parent::__construct();
	}

	function getAll(){

		$alumnos = [];

		try{

			$query = $this->db->connect()->query(
				'SELECT ALU.matricula, ALU.nombre, ALU.apellidos, ALU.direccion, ALU.telefono, ALU.nacimiento, 
				SEX.sexo, GRA.grado, GRU.nombreGrupo, GEN.generacion 
				FROM alumnos AS ALU
				INNER JOIN sexo AS SEX ON SEX.idSexo=ALU.idSexo
				INNER JOIN generaciones AS GEN ON GEN.idGeneracion=ALU.idGeneracion
				INNER JOIN grupos AS GRU ON GRU.idGrupo=ALU.idGrupo
				INNER JOIN grados AS GRA ON GRA.idGrado= GRU.idGrado'); 

			while($row = $query->fetch()){
				$alumno = new Alumno();

				$alumno->matricula = $row['matricula'];
				$alumno->nombre = $row['nombre'];
				$alumno->apellidos = $row['apellidos'];
				$alumno->direccion = $row['direccion'];
				$alumno->telefono = $row['telefono'];
				$alumno->nacimiento = $row['nacimiento'];
			 	$alumno->sexo = $row['sexo'];
				$alumno->generacion = $row['generacion'];
				$alumno->grupo = $row['nombreGrupo']; 
				$alumno->grado = $row['grado'];

				array_push($alumnos, $alumno);
			}

			return $alumnos;

		}catch(PDOException $e){

			return [];
		}
	}





}

?>