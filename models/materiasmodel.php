<?php

include_once 'models/materia.php';
include_once 'models/maestro.php';

class MateriasModel extends Model{

	function __construct(){
		parent::__construct();
	}


	function insertMateria($datos){

		try{

			$query = $this->db->connect()->prepare('INSERT INTO materias(nombreMateria,idGrado) VALUES(:nombreMateria, :gradoMateria)');

			$query->execute(['nombreMateria' => $datos['nombreMateria'],
							 'gradoMateria' => $datos['gradoMateria']]);

			return true;

		}catch(PDOException $e){
			return false;
		}

	}



	function insertClase($datos){

		try{

			$query = $this->db->connect()->prepare('INSERT INTO clases(idMateria,idProfesor) VALUES(:materia, :profesor)');

			$query->execute(['materia' => $datos['materiaClase'],
							 'profesor' => $datos['maestroClase']]);

			return true;

		}catch(PDOException $e){
			return false;
		}
	}


	function getAllMaterias(){

		$materias = [];

		try{

			$query = $this->db->connect()->query('SELECT * FROM materias');

			while($row = $query->fetch()){

				$materia = new Materia();

				$materia->idMateria = $row['idMateria'];
				$materia->nombreMateria = $row['nombreMateria'];
				$materia->grado = $row['idGrado'];

				array_push($materias, $materia);
			}

			return $materias;

		}catch(PDOException $e){
			return [];
		}

	}


	function getAllMaestros(){

		$maestros = [];

		try{

			$query = $this->db->connect()->query('SELECT * FROM profesores');

			while($row = $query->fetch()){

				$maestro = new Maestro();

				$maestro->idProfesor = $row['idProfesor'];
				$maestro->nombre = $row['nombre'];
				$maestro->apellidos = $row['apellidos'];

				array_push($maestros, $maestro);
			}

			return $maestros;

		}catch(PDOException $e){
			return [];
		}

	}


}

?>