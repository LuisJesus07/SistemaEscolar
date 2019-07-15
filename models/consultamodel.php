<?php
include_once 'models/alumno.php';

class ConsultaModel extends Model{

	function __construct(){

		parent::__construct();
	}

	function getAll(){

		$alumnos = [];

		try{

			$query = $this->db->connect()->query(
				'SELECT ALU.matricula, ALU.nombre, ALU.apellidos, ALU.direccion, ALU.telefono, ALU.nacimiento, 
				SEX.sexo, GRA.grado, GRU.nombreGrupo, GEN.generacion 
				FROM alumnos AS ALU
				INNER JOIN sexo AS SEX ON SEX.idSexo=ALU.idSexo
				INNER JOIN generaciones AS GEN ON GEN.idGeneracion=ALU.idGeneracion
				INNER JOIN grupos AS GRU ON GRU.idGrupo=ALU.idGrupo
				INNER JOIN grados AS GRA ON GRA.idGrado= GRU.idGrado'); 

			while($row = $query->fetch()){
				$alumno = new Alumno();

				$alumno->matricula = $row['matricula'];
				$alumno->nombre = $row['nombre'];
				$alumno->apellidos = $row['apellidos'];
				$alumno->direccion = $row['direccion'];
				$alumno->telefono = $row['telefono'];
				$alumno->nacimiento = $row['nacimiento'];
			 	$alumno->sexo = $row['sexo'];
				$alumno->generacion = $row['generacion'];
				$alumno->grupo = $row['nombreGrupo']; 
				$alumno->grado = $row['grado'];

				array_push($alumnos, $alumno);
			}

			return $alumnos;

		}catch(PDOException $e){

			return [];
		}
	}



	function getById($matricula){

		$alumno = new Alumno();

		try{

			$query = $this->db->connect()->prepare('SELECT * FROM alumnos where matricula=:matricula');

			$query->execute(['matricula' => $matricula]);

			while ($row = $query->fetch()) {

				$alumno->matricula = $row['matricula'];
				$alumno->nombre = $row['nombre'];
				$alumno->apellidos = $row['apellidos'];
				$alumno->direccion = $row['direccion'];
				$alumno->telefono = $row['telefono'];
				$alumno->nacimiento = $row['nacimiento'];
			 	$alumno->sexo = $row['idSexo'];
				$alumno->generacion = $row['idGeneracion'];
				$alumno->grupo = $row['idGrupo']; 
			}

			return $alumno;

		}catch(PDOException $e){

			return null;

		}

	}


	function update($datos){

		try{

			$query = $this->db->connect()->prepare('UPDATE alumnos SET nombre=:nombre,apellidos=:apellidos,direccion=:direccion,telefono=:telefono,nacimiento=:nacimiento,idSexo=:sexo,idGeneracion=:generacion,idGrupo=:grupo  WHERE matricula=:matricula');

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


	function delete($matricula){

		try{

			$query = $this->db->connect()->prepare('DELETE FROM alumnos WHERE matricula=:matricula');

			$query->execute(['matricula' => $matricula]);

			return true;

		}catch(PDOException $e){
			return false;
		}

	}





}

?>