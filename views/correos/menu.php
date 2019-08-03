<!DOCTYPE html>
<html>
<head>
	<title>Correo</title>
</head>
<body>

	<?php require 'views/header.php' ?>

	<div class="opciones">

		<h1>Correo</h1>

		<div class="opciones-btn">

			<div class="opcion">
				<img src="<?php echo constant('URL') ?>public/img/registrar.png">

				<a href="<?php echo constant('URL') ?>correos/renderRegistrarCorreo"><input type="button" name="" value="Registrar Correo"></a>
			</div>

			<div class="opcion">
				<img src="<?php echo constant('URL') ?>public/img/consultar.png">

				<a href="<?php echo constant('URL') ?>consultaCorreos"><input type="button" name="" value="Consultar Correos"></a>
					
			</div>
			
		</div>
		
	</div>


	<?php require 'views/sidebar.php' ?>

</body>
</html>