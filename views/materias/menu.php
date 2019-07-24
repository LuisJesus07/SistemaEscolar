<!DOCTYPE html>
<html>
<head>
	<title>Menu Materias</title>
</head>
<body>

	<?php require 'views/header.php' ?>

	<div class="opciones">
		
		<h1>Menu Materias</h1>

		<div class="opciones-btn">
			
			<div class="opcion">
				<img src="<?php echo constant('URL') ?>public/img/materias.png">

				<a href="<?php echo constant('URL') ?>materias/renderRegistrarMateria"><input type="button" name="" value="Registrar materias" ></a>
			</div>

			<div class="opcion">
				<img src="<?php echo constant('URL') ?>public/img/clase.png">

				<a href="<?php echo constant('URL') ?>materias/renderRegistrarClases"><input type="button" name="" value="Registrar clase" ></a>
			</div>

			<div class="opcion">
				<img src="<?php echo constant('URL') ?>public/img/consultar.png">

				<a href="<?php echo constant('URL') . 'consultaClases/verClases' ?>"><input type="button" name="" value="Consultar clases" ></a>
			</div>

		</div>

	</div>	

	<?php require 'views/sidebar.php' ?>

</body>
</html>