<!DOCTYPE html>
<html>
<head>
	<title>Generaciones</title>
</head>
<body>

	<?php require 'views/header.php' ?>

	<div class="opciones">

		<div class="panel">
			
			<h1>Agregar Generacion</h1>

			<form method="POST" action="<?php echo constant('URL') ?>generaciones/agregarGeneracion">
				
				<label>Genracion</label>
				<input type="text" name="generacion">

				<?php if(!empty($this->mensajeError)){ ?>

					<div class="error"><?php echo $this->mensajeError; ?></div>
						
				<?php }?>

				<?php if(!empty($this->mensajeExito)){ ?>

					<div class="error exito"><?php echo $this->mensajeExito; ?></div>
						
				<?php }?>

				<input type="submit" class="btn-registrar" value="Regisrar">
			</form>

		</div>
		

	</div>
	

	<?php require 'views/sidebar.php' ?>

</body>
</html>