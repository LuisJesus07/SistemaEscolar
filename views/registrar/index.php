<!DOCTYPE html>
<html>
<head>
	<title>Registrar Alumno</title>
</head>
<body>

	<?php require 'views/header.php' ?>;

	<div class="opciones">


		<div class="panel">

			<h1>Registrar nuevo alumno</h1>
			
			<form method="POST" action="<?php echo constant('URL') .'registrar/registrarAlumno'  ?>">

					<label>Matricula: </label>
					<input type="text" name="matricula"><br>
				
					<label>Nombre: </label>
					<input type="text" name="nombre">

			
					<label>Apellidos: </label>
					<input type="text" name="apellidos"><br>
					

			
					<label>Direccion: </label>
					<input type="text" name="direccion">
				

			
					<label>Telefono: </label>
					<input type="text" name="telefono"><br>
				

			
					<label>Nacimiento: </label>
					<input type="date" name="nacimiento">
				

			
					<label>Sexo: </label>
					<!--<input type="text" name="sexo"> -->
					<select name="sexo">
						<option value="1">Masculino</option>
						<option value="2">Femenino</option>
					</select><br>
				

				
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

				<?php if(!empty($this->mensajeError)){ ?>

					<div class="error"><?php echo $this->mensajeError; ?></div>
						
				<?php }?>

				<?php if(!empty($this->mensajeExito)){ ?>

					<div class="error exito"><?php echo $this->mensajeExito; ?></div>
						
				<?php }?>
				
				

				<input type="submit" class="btn-registrar" value="Registrar alumno">

			</form>

		</div>
		
	</div>


	<?php require 'views/sidebar.php' ?>;

</body>
</html>