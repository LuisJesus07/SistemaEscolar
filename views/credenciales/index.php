<!DOCTYPE html>
<html>
<head>
	<title>Registrar Credencial</title>
</head>
<body>

	<?php require 'views/header.php' ?>

	<div class="opciones">

		<div class="panel">

			<h1>Registrar Credencial</h1>

			<form method="POST" enctype="multipart/form-data" action="<?php echo constant('URL') . 'credenciales/registrarCredencial' ?>">

				<label>Matricula Alumno: </label>
				<input type="text" name="matricula"><br>

				<label>Foto: </label>
				<input type="file" name="rutaFoto"><br>

				<label>Firma: </label>
				<input type="text" name="firma">

				<?php if(!empty($this->mensajeError)){ ?>

					<div class="error"><?php echo $this->mensajeError; ?></div>
						
				<?php }?>

				<?php if(!empty($this->mensajeExito)){ ?>

					<div class="error exito"><?php echo $this->mensajeExito; ?></div>
						
				<?php }?>

				<input type="submit" class="btn-registrar" value="Registrar">
				
			</form>
			
		</div>
		
	</div>

	<?php require 'views/sidebar.php' ?>

</body>
</html>