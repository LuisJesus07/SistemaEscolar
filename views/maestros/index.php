<!DOCTYPE html>
<html>
<head>
	<title>Registrar Maestro</title>
</head>
<body>

	<?php require 'views/header.php' ?>;

	<div class="opciones">

		<div class="panel">
			
			<h1>Registrar nuevo maestro.</h1>

			<form method="POST" action="<?php echo constant('URL') .'maestros/registrarMaestro'  ?>">

			
					<label>Matricula: </label>
					<input type="text" name="matricula" value="<?php if(!empty($this->matricula)) echo $this->matricula ?>"><br>
				
				
			
					<label>Nombre: </label>
					<input type="text" name="nombre" value="<?php if(!empty($this->nombre)) echo $this->nombre ?>">
				

			
					<label>Apellidos: </label>
					<input type="text" name="apellidos" value="<?php if(!empty($this->apellidos)) echo $this->apellidos ?>"><br>
				

			
					<label>Direccion: </label>
					<input type="text" name="direccion" value="<?php if(!empty($this->direccion)) echo $this->direccion ?>">
				

			
					<label>Telefono: </label>
					<input type="text" name="telefono" value="<?php if(!empty($this->telefono)) echo $this->telefono ?>">
				

			
					<label>Nacimiento: </label>
					<input type="date" name="nacimiento">
				

				
					<label>Sexo: </label>
					<!--<input type="text" name="sexo"> -->
					<select name="sexo">
						<option value="1">Masculino</option>
						<option value="2">Femenino</option>
					</select><br>
				

				
				<?php if(!empty($this->mensajeError)){ ?>

					<div class="error"><?php echo $this->mensajeError; ?></div>
						
				<?php }?>

				<?php if(!empty($this->mensajeExito)){ ?>

					<div class="error exito"><?php echo $this->mensajeExito; ?></div>
						
				<?php }?>


				<input type="submit" class="btn-registrar" value="Registrar maestro">
			</form>

		</div>
		
	</div>


	<?php require 'views/sidebar.php' ?>;

</body>
</html>
