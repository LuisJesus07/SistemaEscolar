<!DOCTYPE html>
<html>
<head>
	<title>Menu Maestros</title>
</head>
<body>

	<?php require 'views/header.php' ?>

	<div class="opciones">

		<h1>Menu Maestros</h1>
		
		<div class="opciones-btn">


			<div class="opcion">
				<img src="<?php echo constant('URL') ?>public/img/maestros.png">

				<a href="<?php echo constant('URL') ?>maestros/renderRegistrarMaestro"><input type="button" name="" value="Maestros"></a>
			</div>

			<div class="opcion">
				<img src="<?php echo constant('URL') ?>public/img/maestros.png">

				<a href="<?php echo constant('URL') ?>consultaMaestros"><input type="button" name="" value="Consultar Maestros"></a>
			</div>
			
		</div>

	</div>

	<?php require 'views/sidebar.php' ?>

</body>
</html>