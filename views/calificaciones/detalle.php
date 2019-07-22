<!DOCTYPE html>
<html>
<head>
	<title>Asignar Cal.</title>
</head>
<body>

	<?php require 'views/header.php' ?>

	<div class="opciones">

		<div class="panel">

			<h1>Calificaciones de <?php echo $this->nombreAlumno ?></h1>

			<form method="POST" action="<?php echo constant('URL') . 'calificaciones/actualizarCalificaciones/' . $this->idCalificacion . '/'. $this->nombreAlumno ?>">

				<label>Primer Bimestre :</label>
				<input type="text" name="primerBimestre" value="<?php echo $this->calificaciones->primerBimestre ?>"><br>

				<label>Segundo Bimestre :</label>
				<input type="text" name="segundoBimestre" value="<?php echo $this->calificaciones->segundoBimestre ?>"><br>

				<label>Tercer Bimestre :</label>
				<input type="text" name="tercerBimestre" value="<?php echo $this->calificaciones->tercerBimestre ?>"><br>

				<label>Cuarto Bimestre :</label>
				<input type="text" name="cuartoBimestre" value="<?php echo $this->calificaciones->cuartoBimestre ?>"><br>

				<label>Quinto Bimestre :</label>
				<input type="text" name="quintoBimestre" value="<?php echo $this->calificaciones->quintoBimestre ?>">

				<input type="submit" class="btn-registrar" value="Registrar">
				
			</form>
			
		</div>
		
	</div>

	<?php require 'views/sidebar.php' ?>

</body>
</html>
