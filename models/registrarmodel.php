<?php

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
}

?>