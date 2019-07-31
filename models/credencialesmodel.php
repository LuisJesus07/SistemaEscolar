<?php

class CredencialesModel extends Model{

	function __construct(){
		parent::__construct();
	}

	function insertCredencial($datos){

		try{

			$query = $this->db->connect()->prepare('INSERT INTO credenciales(rutaFoto,firma,idAlumno) VALUES(:rutaFoto,:firma,:idAlumno)');

			$query->execute(['rutaFoto' => $datos['rutaFoto'],
							 'firma' => $datos['firma'],
							 'idAlumno' => $datos['idAlumno']]);

			return true;

		}catch(PDOException $e){
			return false;
		}

	}


	function getIdAlumno($matricula){

		try{

			$query = $this->db->connect()->prepare('SELECT idAlumno FROM alumnos WHERE matricula=:matricula');
			$query->execute(['matricula' => $matricula]);

			while ($row = $query->fetch()) {

				$idAlumno = $row['idAlumno'];
			}

			return $idAlumno;

		}catch(PDOException $e){
			return false;
		}
	}



	function validarCredencial($matricula){

		try{

			$query = $this->db->connect()->prepare('SELECT COUNT(ALU.matricula) 
													FROM alumnos AS ALU
													INNER JOIN generaciones AS GEN ON GEN.idGeneracion=ALU.idGeneracion
													INNER JOIN grupos AS GRU ON GRU.idGrupo=ALU.idGrupo
													INNER JOIN grados AS GRA ON GRA.idGrado=GRU.idGrado
													INNER JOIN sexo AS SEX ON SEX.idSexo=ALU.idSexo
													INNER JOIN credenciales AS CRE ON ALU.idAlumno=CRE.idAlumno
													WHERE ALU.matricula =:matricula');

			$query->execute(['matricula' => $matricula]);


			return $query->fetch()[0];

		}catch(PDOException $e){
			return false;
		}

	}

}

?>