<?php
include_once 'models/clase.php';
include_once 'models/generacion.php';
include_once 'models/grupo.php';
include_once 'models/idalumno.php';
class InscribirAlumnoMateriaModel extends Model{

	function __construct(){
		parent::__construct();
	}

	function insertAlumnoMateria($datos){

		try{

			
			
			$query = $this->db->connect()->prepare('INSERT INTO calificaciones(primerBimestre,segundoBimestre,tercerBimestre,cuartoBimestre,quintoBimestre,idAlumno,idClase) 
				VALUES("0","0","0","0","0",:idAlumno,:clase)');

			$query->execute(['idAlumno' => $datos['idAlumno'],
							 'clase' => $datos['clase']]);

			return true;

		}catch(PDOException $e){
			return false;
		}

	}



	function getClases(){

		$clases = [];

		try{

			$query = $this->db->connect()->query('SELECT CLA.idClase,PRO.nombre,MAT.nombreMateria,GRA.grado
												  FROM clases AS CLA
												  INNER JOIN profesores AS PRO ON  PRO.idProfesor=CLA.idProfesor
												  INNER JOIN materias AS MAT ON MAT.idMateria=CLA.idMateria
												  INNER JOIN grados AS GRA ON MAT.idGrado=GRA.idGrado
												  ORDER BY GRA.grado ASC');
			while($row = $query->fetch()){
				$clase = new Clase();

				$clase->idClase = $row['idClase'];
				$clase->nombreMaestro = $row['nombre'];
				$clase->nombreMateria = $row['nombreMateria'];
				$clase->gradoMateria = $row['grado'];

				array_push($clases, $clase);
			}

			return $clases;

		}catch(PDOException $e){
			return [];
		}
	}

	function getGeneraciones(){
		$generaciones = [];

		try{

			$query = $this->db->connect()->query('SELECT * FROM generaciones');

			while($row = $query->fetch()){
				$generacion = new Generacion();

				$generacion->generacion = $row['generacion'];

				array_push($generaciones, $generacion);
			}

			return $generaciones;

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

				$grupo->grado = $row['grado'];
				$grupo->nombreGrupo = $row['nombreGrupo'];

				array_push($grupos, $grupo);
			}

			return $grupos;

		}catch(PDOException $e){
			return [];
		}
	}

	

	function getAllIdAlumnos($datos){

		$idAlumnos = [];

		try{

			$query = $this->db->connect()->prepare('SELECT Alu.idAlumno
													FROM alumnos AS ALU
													INNER JOIN generaciones AS GEN ON GEN.idGeneracion=ALU.idGeneracion
													INNER JOIN grupos AS GRU ON GRU.idGrupo=ALU.idGrupo
													INNER JOIN grados AS GRA ON GRA.idGrado=GRU.idGrado
													WHERE GRA.grado = :grado AND GRU.nombreGrupo=:nombreGrupo AND GEN.generacion=:generacion');
			$query->execute(['grado' => $datos['grado'],
							 'nombreGrupo' => $datos['nombreGrupo'],
							 'generacion' => $datos['generacion']]);

			while($row = $query->fetch()){
				$idAlumno = new idAlumno();

				$idAlumno->idAlumno = $row['idAlumno'];

				array_push($idAlumnos, $idAlumno);

			}

			return $idAlumnos;

		}catch(PDOException $e){
			return [];
		}
	}


	//validacion
	function validarAlumnosMateria($datos){


		try{

			$query= $this->db->connect()->prepare('SELECT COUNT(CAL.idCalificacion)
											       FROM alumnos AS ALU
											       INNER JOIN generaciones AS GEN ON GEN.idGeneracion=ALU.idGeneracion
											       INNER JOIN grupos AS GRU ON GRU.idGrupo=ALU.idGrupo
											       INNER JOIN grados AS GRA ON GRA.idGrado=GRU.idGrado 
											       INNER JOIN calificaciones AS CAL ON CAL.idAlumno=ALU.idAlumno
											       INNER JOIN clases AS CLA ON CLA.idClase=CAL.idClase
											       INNER JOIN profesores AS PRO ON PRO.idProfesor=CLA.idProfesor
											       INNER JOIN materias AS MAT ON MAT.idMateria=CLA.idMateria
											       WHERE GEN.generacion=:generacion AND GRA.grado=:grado AND GRU.nombreGrupo=:nombreGrupo AND CLA.idClase=:clase');

			$query->execute(['generacion' => $datos['generacion'],
							 'grado' => $datos['grado'],
							 'nombreGrupo' => $datos['nombreGrupo'],
							 'clase' => $datos['clase']]);

			return $query->fetch()[0];

		}catch(PDOException $e){
			return false;
		}

	}


}

?>