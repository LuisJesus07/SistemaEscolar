<?php

require_once 'controllers/errores.php';

class App{

	function __construct(){

		//echo "<p>Nueva App</p>";

		//obtenemos lo que trae la url y lo asignamos a una variable
		if(isset($_GET['url'])){

			$url = $_GET['url'];
		}else{
			$url = null;
		}

		//separamos la informaco¿ion de url cada /
		$url = rtrim($url,'/');

		//convertimos en un array lo que recibimos de url
		$url = explode('/', $url);

		//cargar el controller main por default si no se ingresa uno
		if(empty($url[0])){

			//cargamos el controlador principal
			$archivoController = 'controllers/main.php';
			require $archivoController;
			$controller = new Main();
			$controller->renderVista();


			//retornamos falso para que no carge el controlador de error
			return false;
		}

		$archivoController = 'controllers/'.$url[0].'.php';
		
		//validar que el controlador exista
		if(file_exists($archivoController)){

			//cargamos el controlador 
			require $archivoController;
			$controller = new $url[0];

			$controller->cargarModelo($url[0]);


			
			//num de parametros que recibimos
			$numParam = sizeof($url);

			if($numParam>1){
				if($numParam>2){

					//metemos los parametros en un array
					$parametros = [];

					for($i=2;$i<$numParam;$i++){

						array_push($parametros, $url[$i]);
					}
					//cargamos el metodo y le pasamos los parametros
					$controller->{$url[1]}($parametros);
				}else{
					//en caso de no recibir parametros cargamos el metodo solamente
					$controller->{$url[1]}();
				}
			}else{
				$controller->renderVista();
			}


		}else{

			$controller = new Errores();
			$controller->renderVista();
		}

		

		


	}
}

?>