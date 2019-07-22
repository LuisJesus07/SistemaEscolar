<?php
include_once 'models/calificacion.php';
class ConsultaCalificacionesModel extends Model{

	function __construct(){
		parent::__construct();
	}

	function getCalificaciones($matricula){

		try{

		$calificaciones = [];

		$query = $this->db->connect()->prepare('SELECT GEN.generacion,GRA.grado,GRU.nombreGrupo,ALU.matricula,
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
												WHERE ALU.matricula=:matricula');

		$query->execute(['matricula' => $matricula['matricula']]);

		while($row = $query->fetch()){
			$calificacion = new Calificacion();

			$calificacion->generacion = $row['generacion'];
			$calificacion->grado = $row['grado'];
			$calificacion->nombreGrupo = $row['nombreGrupo'];
			$calificacion->matricula = $row['matricula'];
			$calificacion->nombre = $row['nombre'];
			$calificacion->apellidos = $row['apellidos'];
			$calificacion->nombreMateria = $row['nombreMateria'];
			$calificacion->nombreMaestro = $row['nombreMaestro'];
			$calificacion->primerBimestre = $row['primerBimestre'];
			$calificacion->segundoBimestre = $row['segundoBimestre'];
			$calificacion->tercerBimestre = $row['tercerBimestre'];
			$calificacion->cuartoBimestre = $row['cuartoBimestre'];
			$calificacion->quintoBimestre = $row['quintoBimestre'];

			array_push($calificaciones, $calificacion);

			
		}


		return $calificaciones;

		}catch(PDOException $e){
			return [];
		}
	}


	

}

?>