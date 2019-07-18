<!DOCTYPE html>
<html>
<head>
	<title>Generaciones</title>
</head>
<body>

	<?php require 'views/header.php' ?>

	<div class="opciones">
		
		<h1>Agregar Generacion</h1>
		<h3><?php  echo $this->mensaje; ?></h3>

		<form method="POST" action="<?php echo constant('URL') ?>generaciones/agregarGeneracion">
			
			<label>Genracion</label>
			<input type="text" name="generacion">

			<input type="submit" name="" value="Regisrar">
		</form>
		

	</div>
	

	<?php require 'views/sidebar.php' ?>

</body>
</html>