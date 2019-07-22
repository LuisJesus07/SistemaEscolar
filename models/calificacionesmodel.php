<?php
include_once 'models/calificacion.php';


class CalificacionesModel extends Model{

	function __construct(){
		parent::__construct();
	}


	function getAlumnosMateria($datos){

		$alumnos = [];

		try{

			$query = $this->db->connect()->prepare('SELECT CAL.idCalificacion,GEN.generacion,GRA.grado,GRU.nombreGrupo,ALU.matricula,
				ALU.nombre,ALU.apellidos,MAT.nombreMateria,PRO.nombre AS "nombreMaestro",
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


}

?>