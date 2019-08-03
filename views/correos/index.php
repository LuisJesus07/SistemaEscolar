<!DOCTYPE html>
<html>
<head>
	<title>Registrar Correo</title>
</head>
<body>

	<?php require 'views/header.php' ?>

	<div class="opciones">

		<div class="panel">

			<h1>Registrar Correo</h1>
			
			<form method="POST" action="<?php echo constant('URL') . 'correos/registrarCorreo'  ?>">

				<label>Matricula Alumno: </label>
				<input type="text" name="matricula"><br>

				<label>Correo: </label>
				<input type="text" name="correo">

				<label>Contraseña: </label>
				<input type="text" name="password">

				<?php if(!empty($this->mensajeError)){ ?>

					<div class="error"><?php echo $this->mensajeError; ?></div>
						
				<?php }?>

				<?php if(!empty($this->mensajeExito)){ ?>

					<div class="error exito"><?php echo $this->mensajeExito; ?></div>
						
				<?php }?>

				<input type="submit" class="btn-registrar" name="" value="Registrar">

				
			</form>	
			
		</div>
		
	</div>


	<?php require 'views/sidebar.php' ?>

</body>
</html>