<?php
include_once 'models/clase.php';

class ConsultaClasesModel extends Model{

	function __construct(){
		parent::__construct();
	}

	function getAllClases(){

		$clases = [];

		try{

			$query = $this->db->connect()->query('SELECT PRO.matricula,PRO.nombre,PRO.apellidos,MAT.nombreMateria, GRA.grado  
				FROM clases AS CLA
				INNER JOIN profesores AS PRO ON  PRO.idProfesor=CLA.idProfesor
				INNER JOIN materias AS MAT ON MAT.idMateria=CLA.idMateria
				INNER JOIN grados AS GRA ON MAT.idGrado=GRA.idGrado
				ORDER BY GRA.grado ASC');

			while($row = $query->fetch()){
				$clase = new Clase();

				$clase->matriculaMaestro = $row['matricula'];
				$clase->nombreMaestro = $row['nombre'];
				$clase->apellidosMaestro = $row['apellidos'];
				$clase->nombreMateria = $row['nombreMateria'];
				$clase->gradoMateria = $row['grado'];

				array_push($clases, $clase);
			}

			return $clases;

		}catch(PDOException $e){
			return [];
		}
	}
}

?>