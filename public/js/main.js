const botones = document.querySelectorAll(".btn-eliminar");



botones.forEach(boton => {

	boton.addEventListener("click", function(){

		//console.log("hola");
		const matricula = this.dataset.matricula;

		//saber si es alumno o maestro
		const rol = this.dataset.rol;


		const confirm = window.confirm("Desea eliminar al usuario con la matricula "+ matricula);

		if(confirm){
			//eliminar con AJAX

			if(rol=="maestro"){
				url = "http://localhost/sistema%20escolar/consultaMaestros/eliminarMaestro/" + matricula;
			}else{
				url = "http://localhost/sistema%20escolar/consulta/eliminarAlumno/" + matricula;
			}

			httpRequest(url , function(){

				document.querySelector("#respuesta").innerHTML = this.responseText;

				const tbody = document.querySelector("#tbody-alumnos");
				const fila = document.querySelector("#fila-"+ matricula);

				tbody.removeChild(fila);
			});

			
		}
		
	});

});

function httpRequest(url, callback){

	http = new XMLHttpRequest();

	http.open("GET", url);

	http.send();

	http.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200){
			//mandamos la respuesta atravez de la variable callback con el parametro
			callback.apply(http);
		}
	}

}