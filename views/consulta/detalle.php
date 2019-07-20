<!DOCTYPE html>
<html>
<head>
	<title>Editar Alumno</title>
</head>
<body>

	<?php require 'views/header.php' ?>;

	<div class="opciones">

		<div class="panel">

			<h1>Editar al alumno(a) <?php echo $this->alumno->nombre ?></h1>

			<form method="POST" action="<?php echo constant('URL') .'consulta/actualizarAlumno'  ?>">

			
					<label>Matricula: </label>
					<input type="text" name="matricula" disabled value="<?php echo $this->alumno->matricula ?>"><br>
				
				
			
					<label>Nombre: </label>
					<input type="text" name="nombre" value="<?php echo $this->alumno->nombre ?>">
				

			
					<label>Apellidos: </label>
					<input type="text" name="apellidos" value="<?php echo $this->alumno->apellidos ?>"><br>
				

			
					<label>Direccion: </label>
					<input type="text" name="direccion" value="<?php echo $this->alumno->direccion ?>">
				

					<label>Telefono: </label>
					<input type="text" name="telefono" value="<?php echo $this->alumno->telefono ?>"><br>
				

			
					<label>Nacimiento: </label>
					<input type="date" name="nacimiento" value="<?php echo $this->alumno->nacimiento ?>">
				

			
					<label>Sexo: </label>
					<input type="text" name="sexo" value="<?php echo $this->alumno->sexo ?>"><br>
				

			
					<label>Grupo: </label>
					<input type="text" name="grupo" value="<?php echo $this->alumno->grupo ?>">
				

			
					<label>Generacion: </label>
					<input type="text" name="generacion" value="<?php echo $this->alumno->generacion ?>">
				

				<?php if(!empty($this->mensajeError)){ ?>

					<div class="error"><?php echo $this->mensajeError; ?></div>
						
				<?php }?>

				<?php if(!empty($this->mensajeExito)){ ?>

					<div class="error exito"><?php echo $this->mensajeExito; ?></div>
						
				<?php }?>

				<input type="submit" class="btn-registrar" value="Actualizar alumno">

			</form>

		</div>
		
	</div>


	<?php require 'views/sidebar.php' ?>;

</body>
</html>