<?php
include_once 'models/infoCuenta.php';

class Loginmodel extends Model{

	function __construct(){
		parent::__construct();
	}

	function verificarUsuario($datos){

		try{

			$query = $this->db->connect()->prepare('SELECT * FROM correos WHERE correo=:correo AND password=:password');

			$query->execute(['correo' => $datos['correo'],
							 'password' => $datos['password']]);


			return $query->fetch();

		}catch(PDOExeption $e){
			return false;
		}

	}

	function getInfoAdmin($idAdministrador){


		try{

			$query = $this->db->connect()->prepare('SELECT ADM.nombre, ADM.apellidos, ADM.rutaFoto, CORR.correo, CORR.privilegios
				FROM administradores AS ADM
				INNER JOIN correos AS CORR ON CORR.idAdministrador=ADM.idAdministrador
				WHERE ADM.idAdministrador=:idAdministrador');

			$query->execute(['idAdministrador' => $idAdministrador]);

			while ($row = $query->fetch()) {

				$infoCuenta = new InfoCuenta();

				$infoCuenta->nombre = $row['nombre'];
				$infoCuenta->apellidos = $row['apellidos'];
				$infoCuenta->rutaFoto = $row['rutaFoto'];
				$infoCuenta->correo = $row['correo'];
				$infoCuenta->privilegios = $row['privilegios'];
			}

			//guardamos la info del admin en una sesion en forma de objeto
			session_start();
			//el serialize nos permite acceder a los atributos del objeto
			$_SESSION['infoCuenta'] = serialize($infoCuenta);

			
			return $_SESSION['infoCuenta'];


		}catch(PDOExeption $e){
			return false;
		}
		
	}
}

?>