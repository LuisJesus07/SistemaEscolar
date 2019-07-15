<?php

include_once 'models/grupo.php';
include_once 'models/generacion.php';

class RegistrarModel extends Model{

	function __construct(){

		parent:: __construct();
	}

	function insertAlumno($datos){

		try{

			$query = $this->db->connect()->prepare('INSERT INTO alumnos(matricula,nombre,apellidos,direccion,telefono,nacimiento,idSexo,idGeneracion,idGrupo) VALUES(:matricula,:nombre,:apellidos,:direccion,:telefono,:nacimiento,:sexo,:generacion,:grupo)');

			$query->execute(['matricula'  => $datos['matricula'],
							'nombre'     => $datos['nombre'],
							'apellidos'  => $datos['apellidos'],
							'direccion'  => $datos['direccion'],
							'telefono'   => $datos['telefono'],
							'nacimiento' => $datos['nacimiento'],
							'sexo'       => $datos['sexo'],
							'generacion' => $datos['generacion'],
							'grupo'      => $datos['grupo']]);

			return true;

		}catch(PDOException $e){

			return false;

		}
		
	}


	function getGrupos(){

		$grupos = [];

		try{

			$query = $this->db->connect()->query('SELECT GRU.idGrupo, GRA.grado, GRU.nombreGrupo
												  FROM grupos AS GRU
												  INNER JOIN grados AS GRA ON GRA.idGrado=GRU.idGrado;');

			while ($row = $query->fetch()) {

				$grupo = new Grupo();

				$grupo->idGrupo = $row['idGrupo'];
				$grupo->nombreGrupo = $row['nombreGrupo'];
				$grupo->grado = $row['grado'];

				array_push($grupos, $grupo);
			}


			return $grupos;

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

				$generacion->idGeneracion = $row['idGeneracion'];
				$generacion->generacion = $row['generacion'];

				array_push($generaciones, $generacion);

			}

			return $generaciones;


		}catch(PDOException $e){

			return [];
		}
	}








}

?>