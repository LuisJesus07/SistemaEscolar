<?php
include_once 'models/alumno.php';
include_once 'models/clase.php';
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

	function getIdAlumno($datos){

		try{

			$query = $this->db->connect()->prepare('SELECT idAlumno FROM alumnos WHERE matricula=:matricula');

			$query->execute(['matricula' => $datos['matricula']]);

			while($row = $query->fetch()){
				$idAlumno = $row['idAlumno'];
			}

			return $idAlumno;

		}catch(PDOException $e){
			return false;
		}
	}


}

?>