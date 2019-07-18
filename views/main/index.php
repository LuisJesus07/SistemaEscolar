<!DOCTYPE html>
<html>
<head>
	<title>Menu Principal</title>
</head>
<body>

	<?php require 'views/header.php'; ?>

	<div class="principal">
		
		<div class="opciones">

			<h1>Sistema Escolar</h1>

			<div class="opciones-btn">

				<div class="opcion">
					<img src="<?php echo constant('URL') ?>public/img/alumnos.png">

					<a href="<?php echo constant('URL') ?>registrar"><input type="button" name="" value="Alumnos"></a>
				</div>

				<div class="opcion">
					<img src="<?php echo constant('URL') ?>public/img/calificaciones.png">

					<input type="button" name="" value="Calificaciones">
				</div>

				<div class="opcion">
					<img src="<?php echo constant('URL') ?>public/img/generacion.png">

					<a href="<?php echo constant('URL') ?>generaciones"><input type="button" name="" value="Generación"></a>
				</div>

				<div class="opcion">
					<img src="<?php echo constant('URL') ?>public/img/grupos.png">

					<a href="<?php echo constant('URL') ?>consultaGrupos"><input type="button" name="" value="Grupos"></a>
				</div>

				<div class="opcion">
					<img src="<?php echo constant('URL') ?>public/img/maestros.png">

					<a href="<?php echo constant('URL') ?>maestros"><input type="button" name="" value="Maestros"></a>
				</div>

				<div class="opcion">
					<img src="<?php echo constant('URL') ?>public/img/materias.png">

					<input type="button" name="" value="Materias" >
				</div>

				<div class="opcion">
					<img src="<?php echo constant('URL') ?>public/img/alumnos.png">

					<a href="<?php echo constant('URL') ?>consulta"><input type="button" name="" value="Consultar Alumnos"></a>
					
				</div>

				<div class="opcion">
					<img src="<?php echo constant('URL') ?>public/img/maestros.png">

					<a href="<?php echo constant('URL') ?>consultaMaestros"><input type="button" name="" value="Consultar Maestros"></a>
				</div>
				
			</div>
			

		</div>

	
	<?php require 'views/sidebar.php'; ?>


	</div>

	

</body>
</html>