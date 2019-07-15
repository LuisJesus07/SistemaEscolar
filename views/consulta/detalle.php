<!DOCTYPE html>
<html>
<head>
	<title>Registrar Alumno</title>
</head>
<body>

	<?php require 'views/header.php' ?>;

	<div class="opciones">

		<h1>Editar al alumno(a) <?php echo $this->alumno->nombre ?></h1>

		<form method="POST" action="<?php echo constant('URL') .'consulta/actualizarAlumno'  ?>">

			<h3><?php echo $this->mensaje; ?></h3>

			<p>
				<label>Matricula: </label>
				<input type="text" name="matricula" disabled value="<?php echo $this->alumno->matricula ?>">
			</p>
			
			<p>
				<label>Nombre: </label>
				<input type="text" name="nombre" value="<?php echo $this->alumno->nombre ?>">
			</p>

			<p>
				<label>Apellidos: </label>
				<input type="text" name="apellidos" value="<?php echo $this->alumno->apellidos ?>">
			</p>

			<p>
				<label>Direccion: </label>
				<input type="text" name="direccion" value="<?php echo $this->alumno->direccion ?>">
			</p>

			<p>
				<label>Telefono: </label>
				<input type="text" name="telefono" value="<?php echo $this->alumno->telefono ?>">
			</p>

			<p>
				<label>Nacimiento: </label>
				<input type="date" name="nacimiento" value="<?php echo $this->alumno->nacimiento ?>">
			</p>

			<p>
				<label>Sexo: </label>
				<input type="text" name="sexo" value="<?php echo $this->alumno->sexo ?>">
			</p>

			<p>
				<label>Grupo: </label>
				<input type="text" name="grupo" value="<?php echo $this->alumno->grupo ?>">
			</p>

			<p>
				<label>Generacion: </label>
				<input type="text" name="generacion" value="<?php echo $this->alumno->generacion ?>">
			</p>



			<input type="submit" name="" value="Actualizar alumno">
		</form>
		
	</div>


	<?php require 'views/sidebar.php' ?>;

</body>
</html>