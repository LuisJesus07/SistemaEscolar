<!DOCTYPE html>
<html>
<head>
	<title>Menu Calificaciones</title>
</head>
<body>

	<?php require 'views/header.php'  ?>

	<div class="opciones">

		<h1>Menu Calificaciones</h1>
		
		<div class="opciones-btn">

			<div class="opcion">
				<img src="<?php echo constant('URL') ?>public/img/consultar.png">

				<a href="<?php echo constant('URL') ?>consultaCalificaciones"><input type="button" name="" value="Consultar"></a>
			</div>

			<div class="opcion">
				<img src="<?php echo constant('URL') ?>public/img/calificaciones.png">

				<a href="<?php echo constant('URL') ?>calificaciones/renderAlumnosMateria"><input type="button" name="" value="Asignar Calificacion"></a>
			</div>
			
		</div>

	</div>


	<?php require 'views/sidebar.php'  ?>

</body>
</html>