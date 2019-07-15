<!DOCTYPE html>
<html>
<head>
	<title>Registrar Alumno</title>
</head>
<body>

	<?php require 'views/header.php' ?>;

	<div class="opciones">

		<h1>Registrar nuevo alumno.</h1>

		<form method="POST" action="<?php echo constant('URL') .'registrar/registrarAlumno'  ?>">

			<h3><?php echo $this->mensaje; ?></h3>

			<p>
				<label>Matricula: </label>
				<input type="text" name="matricula">
			</p>
			
			<p>
				<label>Nombre: </label>
				<input type="text" name="nombre">
			</p>

			<p>
				<label>Apellidos: </label>
				<input type="text" name="apellidos">
			</p>

			<p>
				<label>Direccion: </label>
				<input type="text" name="direccion">
			</p>

			<p>
				<label>Telefono: </label>
				<input type="text" name="telefono">
			</p>

			<p>
				<label>Nacimiento: </label>
				<input type="date" name="nacimiento">
			</p>

			<p>
				<label>Sexo: </label>
				<!--<input type="text" name="sexo"> -->
				<select name="sexo">
					<option value="1">Masculino</option>
					<option value="2">Femenino</option>
				</select>
			</p>

			<p>
				<label>Grupo: </label>
				<!--<input type="text" name="grupo"> -->
				<select name="grupo">
					<?php
					include_once 'models/grupo.php';

					foreach($this->grupos as $row){
						$grupo = new Grupo();
						$grupo = $row;


					?>
					<option value="<?php echo $grupo->idGrupo ?>"><?php echo $grupo->grado."°". $grupo->nombreGrupo ?></option>
					
					<?php } ?>

				</select>

			</p>

			<p>
				<label>Generacion: </label>
				<!--<input type="text" name="generacion"> -->

				<select name="generacion">
					<?php 

					include_once 'models/generacion.php';

					foreach($this->generaciones as $row){

						$generacion = new Generacion();
						$generacion = $row;

					?>

					<option value="<?php echo $generacion->idGeneracion ?>"><?php echo $generacion->generacion  ?></option>


					<?php } ?>

				</select>

			</p>



			<input type="submit" name="" value="Registrar alumno">
		</form>
		
	</div>


	<?php require 'views/sidebar.php' ?>;

</body>
</html>