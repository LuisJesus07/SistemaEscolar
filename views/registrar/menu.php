<!DOCTYPE html>
<html>
<head>
	<title>Menu Alumnos</title>
</head>
<body>

	<?php require 'views/header.php' ?>

	<div class="opciones">

		<h1>Menu Alumnos</h1>
		
		<div class="opciones-btn">

			<div class="opcion">
				<img src="<?php echo constant('URL') ?>public/img/registrar.png">

				<a href="<?php echo constant('URL') ?>registrar/renderRegistrarAlumno"><input type="button" name="" value="Registrar Alumno"></a>
			</div>

			<div class="opcion">
				<img src="<?php echo constant('URL') ?>public/img/consultar.png">

				<a href="<?php echo constant('URL') ?>consulta"><input type="button" name="" value="Consultar Alumnos"></a>
					
			</div>

			<div class="opcion">
				<img src="<?php echo constant('URL') ?>public/img/credencial.png">

				<a href="<?php echo constant('URL') ?>credenciales"><input type="button" name="" value="Credenciales"></a>
			</div>

			<div class="opcion">
				<img src="<?php echo constant('URL') ?>public/img/correo.png">

				<a href="<?php echo constant('URL') ?>correos"><input type="button" name="" value="Correo"></a>
			</div>
			
		</div>

	</div>

	<?php require 'views/sidebar.php' ?>

</body>
</html>