<?php
include_once 'models/alumno.php';
include_once 'models/generacion.php';
include_once 'models/grupo.php';

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
                WHERE GRA.grado =:grado AND GRU.nombreGrupo=:nombreGrupo AND GEN.generacion=:generacion');

			$query->execute(['grado'       => $datos['grado'],
							 'nombreGrupo' => $datos['nombreGrupo'],
							 'generacion' => $datos['generacion']]);

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


	function getGeneraciones(){

		try{

			$generaciones = [];

			$query = $this->db->connect()->query('SELECT * FROM generaciones');

			while ($row = $query->fetch()) {
				$generacion = new Generacion();

				$generacion->generacion = $row['generacion'];

				array_push($generaciones, $generacion);
			}

			return $generaciones;

		}catch(PDOException $e){

			return [];
		}
	}


	function getAllGrupos(){

		$grupos = [];

		try{

			$query = $this->db->connect()->query('SELECT GRA.grado, GRU.nombreGrupo
												  FROM grupos AS GRU
												  INNER JOIN grados AS GRA ON GRA.idGrado=GRU.idGrado');

			while($row = $query->fetch()){

				$grupo = new Grupo();

				$grupo->grado = $row['grado'];
				$grupo->nombreGrupo = $row['nombreGrupo'];

				array_push($grupos, $grupo);
			}

			return $grupos;

		}catch(PDOException $e){
			return [];
		}


	}



}

?>