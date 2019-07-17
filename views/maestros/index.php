<!DOCTYPE html>
<html>
<head>
	<title>Registrar Maestro</title>
</head>
<body>

	<?php require 'views/header.php' ?>;

	<div class="opciones">

		<h1>Registrar nuevo maestro.</h1>

		<form method="POST" action="<?php echo constant('URL') .'maestros/registrarMaestro'  ?>">

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

			



			<input type="submit" name="" value="Registrar alumno">
		</form>
		
	</div>


	<?php require 'views/sidebar.php' ?>;

</body>
</html>
