<?php
include_once 'models/alumno.php';

class ConsultaCredencialesModel extends Model{

	function __construct(){
		parent::__construct();
	}

	function getInfoCredencial($matricula){

		try{

			$query = $this->db->connect()->prepare('SELECT ALU.matricula,ALU.nombre, ALU.apellidos,ALU.direccion,ALU.telefono,SEX.sexo,GEN.generacion,
GRA.grado,GRU.nombreGrupo,CRE.rutaFoto,CRE.firma 
													FROM alumnos AS ALU
													INNER JOIN generaciones AS GEN ON GEN.idGeneracion=ALU.idGeneracion
													INNER JOIN grupos AS GRU ON GRU.idGrupo=ALU.idGrupo
													INNER JOIN grados AS GRA ON GRA.idGrado=GRU.idGrado
													INNER JOIN sexo AS SEX ON SEX.idSexo=ALU.idSexo
													INNER JOIN credenciales AS CRE ON ALU.idAlumno=CRE.idAlumno
													WHERE ALU.matricula = :matricula ');

			$query->execute(['matricula' => $matricula]);

			while ($row = $query->fetch()) {
				$alumno = new Alumno();

				$alumno->matricula = $row['matricula'];
				$alumno->nombre = $row['nombre'];
				$alumno->apellidos = $row['apellidos'];
				$alumno->direccion = $row['direccion'];
				$alumno->telefono = $row['telefono'];
				$alumno->sexo = $row['sexo'];
				$alumno->generacion = $row['generacion'];
				$alumno->grado = $row['grado'];
				$alumno->grupo = $row['nombreGrupo']; 
				$alumno->rutaFoto = $row['rutaFoto'];
				$alumno->firma = $row['firma'];

				return $alumno;

			}

			

		}catch(PDOException $e){
			return false;
		}

	}
}

?>