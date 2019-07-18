<?php
include_once 'models/alumno.php';

class ConsultaGruposModel extends Model{

	function __construct(){
		parent::__construct();
	}


	function getGrupo($datos){

		try{

			$alumnos = [];

			$query= $this->db->connect()->prepare('SELECT GEN.generacion, GRA.grado, GRU.nombreGrupo, ALU.matricula,ALU.nombre,ALU.apellidos
                FROM alumnos AS ALU
                INNER JOIN generaciones AS GEN ON GEN.idGeneracion=ALU.idGeneracion
                INNER JOIN grupos AS GRU ON GRU.idGrupo=ALU.idGrupo
                INNER JOIN grados AS GRA ON GRA.idGrado=GRU.idGrado
                WHERE GRA.grado =:grado AND GRU.nombreGrupo=:nombreGrupo');

			$query->execute(['grado'       => $datos['grado'],
							 'nombreGrupo' => $datos['nombreGrupo']]);

			while($row = $query->fetch()){

				$alumno = new Alumno();

				$alumno->generacion = $row['generacion'];
				$alumno->grado = $row['grado'];
				$alumno->grupo = $row['nombreGrupo'];
				$alumno->matricula = $row['matricula'];
				$alumno->nombre = $row['nombre'];
				$alumno->apellidos = $row['apellidos'];

				array_push($alumnos, $alumno);

			}

			return $alumnos;


		}catch(PDOException $e){

			return [];
		}
	}
}

?>