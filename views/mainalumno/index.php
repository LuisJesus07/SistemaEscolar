<?php
	
	include_once 'models/infocuenta.php';	
	$infoCuenta = $_SESSION['infoCuenta'];
	$infoCuenta = unserialize($infoCuenta);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
</head>
<body>

	<?php include 'views/header.php' ?>

	<div class="principal">

		<div class="opciones">

			<h1>Sistema Escolar</h1>

			<div class="opciones-btn">

				<div class="opcion">
					<img src="<?php echo constant('URL') ?>public/img/alumnos.png">

					<a href="<?php echo constant('URL') . 'consulta/verAlumno/'?>">
					<input type="button" name="" value="Mi información"></a>
				</div>

				<div class="opcion">
					<img src="<?php echo constant('URL') ?>public/img/calificaciones.png">

					<a href="<?php echo constant('URL') . 'consultaCalificaciones/verCalificaciones/'?>"><input type="button" name="" value="Mis calificaciones"></a>
				</div>
				
			</div>
			
		</div>
		
		
	</div>

	<?php include 'views/sidebar.php' ?>

</body>
</html>