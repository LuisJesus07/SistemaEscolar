<!DOCTYPE html>
<html>
<head>
	<title>Detalle maestro</title>
</head>
<body>

	<?php require 'views/header.php' ?>;

	<div class="opciones">

		<div class="panel">

		<h1>Editar al maestro(a) <?php echo $this->maestro->nombre ?></h1>

			<form method="POST" action="<?php echo constant('URL') .'consultaMaestros/actualizarMaestro' ?>">

			
					<label>Matricula: </label>
					<input type="text" name="matricula" disabled value="<?php echo $this->maestro->matricula ?>"><br>
				
				
			
					<label>Nombre: </label>
					<input type="text" name="nombre" value="<?php echo $this->maestro->nombre ?>">
				

			
					<label>Apellidos: </label>
					<input type="text" name="apellidos" value="<?php echo $this->maestro->apellidos ?>"><br>
				

			
					<label>Direccion: </label>
					<input type="text" name="direccion" value="<?php echo $this->maestro->direccion ?>">
				

			
					<label>Telefono: </label>
					<input type="text" name="telefono" value="<?php echo $this->maestro->telefono ?>">
				

			
					<label>Nacimiento: </label>
					<input type="date" name="nacimiento" value="<?php echo $this->maestro->nacimiento ?>">
				

			
					<label>Sexo: </label>
					<input type="text" name="sexo" value="<?php echo $this->maestro->sexo ?>">
				


				<?php if(!empty($this->mensajeError)){ ?>

					<div class="error"><?php echo $this->mensajeError; ?></div>
						
				<?php }?>

				<?php if(!empty($this->mensajeExito)){ ?>

					<div class="error exito"><?php echo $this->mensajeExito; ?></div>
						
				<?php }?>



				<input type="submit" class="btn-registrar" value="Actualizar maestro">
			</form>

		</div>
		
	</div>


	<?php require 'views/sidebar.php' ?>;


</body>
</html>