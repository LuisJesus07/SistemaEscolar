<?php
include_once 'models/calificacion.php';
include_once 'models/generacion.php';
include_once 'models/materia.php';
include_once 'models/grupo.php';

class CalificacionesModel extends Model{

	function __construct(){
		parent::__construct();
	}


	function getAlumnosMateria($datos){

		$alumnos = [];

		try{

			$query = $this->db->connect()->prepare('SELECT CAL.idCalificacion,GEN.generacion,GRA.grado,GRU.nombreGrupo,ALU.matricula,
				ALU.nombre,ALU.apellidos,MAT.nombreMateria,PRO.nombre AS "nombreMaestro",PRO.apellidos AS "apellidosMaestro",
				CAL.primerBimestre,CAL.segundoBimestre,CAL.tercerBimestre,CAL.cuartoBimestre,CAL.quintoBimestre
				FROM alumnos AS ALU
				INNER JOIN generaciones AS GEN ON GEN.idGeneracion=ALU.idGeneracion
				INNER JOIN grupos AS GRU ON GRU.idGrupo=ALU.idGrupo
				INNER JOIN grados AS GRA ON GRA.idGrado=GRU.idGrado 
				INNER JOIN calificaciones AS CAL ON CAL.idAlumno=ALU.idAlumno
				INNER JOIN clases AS CLA ON CLA.idClase=CAL.idClase
				INNER JOIN profesores AS PRO ON PRO.idProfesor=CLA.idProfesor
				INNER JOIN materias AS MAT ON MAT.idMateria=CLA.idMateria
				WHERE GEN.generacion=:generacion AND GRA.grado=:grado AND GRU.nombreGrupo=:nombreGrupo AND MAT.nombreMateria=:materia');

			$query->execute(['generacion' => $datos['generacion'],
							 'grado' => $datos['grado'],
							 'nombreGrupo' => $datos['nombreGrupo'],
							 'materia' => $datos['materia']]);

			while($row = $query->fetch()){
				$alumno = new Calificacion();

				$alumno->idCalificacion = $row['idCalificacion'];
				$alumno->matricula = $row['matricula'];
				$alumno->nombre = $row['nombre'];
				$alumno->apellidos = $row['apellidos'];
				$alumno->nombreMateria = $row['nombreMateria'];
				$alumno->nombreMaestro = $row['nombreMaestro'];
				$alumno->apellidosMaestro = $row['apellidosMaestro'];

				array_push($alumnos, $alumno);
			}

			return $alumnos;

		}catch(PDOException $e){
			return [];
		}

	}


	function getCalificacionesAlumno($idCalificacion){

		$calificacion = new Calificacion();

		try{

			$query = $this->db->connect()->prepare('SELECT * FROM calificaciones WHERE idCalificacion=:idCalificacion');

			$query->execute(['idCalificacion' => $idCalificacion]);

			while ($row = $query->fetch()) {
				
				$calificacion->primerBimestre = $row['primerBimestre'];
				$calificacion->segundoBimestre = $row['segundoBimestre'];
				$calificacion->tercerBimestre = $row['tercerBimestre'];
				$calificacion->cuartoBimestre = $row['cuartoBimestre'];
				$calificacion->quintoBimestre = $row['quintoBimestre'];
			}

			return $calificacion;


		}catch(PDOException $e){
			return false;
		}


	}


	function updateCalificaciones($datos){

		try{

			$query = $this->db->connect()->prepare('UPDATE calificaciones SET primerBimestre=:primerBimestre, segundoBimestre=:segundoBimestre, tercerBimestre=:tercerBimestre, cuartoBimestre=:cuartoBimestre, quintoBimestre=:quintoBimestre WHERE idCalificacion=:idCalificacion');

			$query->execute(['idCalificacion' => $datos['idCalificacion'],
							 'primerBimestre' => $datos['primerBimestre'],
							 'segundoBimestre' => $datos['segundoBimestre'],
							 'tercerBimestre' => $datos['tercerBimestre'],
							 'cuartoBimestre' => $datos['cuartoBimestre'],
							 'quintoBimestre' => $datos['quintoBimestre']]);
			return true;

		}catch(PDOException $e){
			return false;
		}
	}


	//obtener datos de los select

	function getGeneraciones(){

		$generaciones = [];

		try{

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


	function getMaterias(){

		$materias = [];

		try{
			$query = $this->db->connect()->query('SELECT * FROM materias');

			while ($row = $query->fetch()) {
				$materia = new Materia();

				$materia->nombreMateria = $row['nombreMateria'];

				array_push($materias,$materia);
			}

			return $materias;

		}catch(PDOException $e){
			return [];
		}

	}

	function getGrupos(){

		$grupos = [];

		try{

			$query = $this->db->connect()->query('SELECT GRU.idGrupo, GRA.grado, GRU.nombreGrupo
												  FROM grupos AS GRU
												  INNER JOIN grados AS GRA ON GRA.idGrado=GRU.idGrado;');

			while($row = $query->fetch()){
				$grupo = new Grupo();

				$grupo->nombreGrupo = $row['nombreGrupo'];
				$grupo->grado = $row['grado'];

				array_push($grupos, $grupo);
			}

			return $grupos;

		}catch(PDOException $e){
			return [];
		}

	}


}

?>