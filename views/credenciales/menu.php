<!DOCTYPE html>
<html>
<head>
	<title>Credenciales</title>
</head>
<body>

	<?php require 'views/header.php' ?>

	<div class="opciones">

			<h1>Credenciales</h1>

			<div class="opciones-btn">

				<div class="opcion">
				<img src="<?php echo constant('URL') ?>public/img/registrar.png">

				<a href="<?php echo constant('URL') ?>credenciales/renderRegistrar"><input type="button" name="" value="Registrar"></a>
				</div>

				<div class="opcion">
					<img src="<?php echo constant('URL') ?>public/img/consultar.png">

					<a href="<?php echo constant('URL') ?>consultaCredenciales"><input type="button" name="" value="Consultar"></a>
				
			</div>
			
		</div>
		
	</div>

	<?php require 'views/sidebar.php' ?>

</body>
</html>