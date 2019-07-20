<!DOCTYPE html>
<html>
<head>
	<title>Registrar Materia</title>
</head>
<body>

	<?php require 'views/header.php' ?>

	<div class="opciones">

		<div class="panel">

			<h1>Registrar Materia</h1>

			<form method="POST" action="<?php echo constant('URL') . 'materias/registarMateria' ?>">
				
				<label>Nombre Materia: </label>
				<input type="text" name="nombreMateria"><br>

				<label>Grado de la materia: </label>
				<select name="gradoMateria">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>

				<?php if(!empty($this->mensajeError)){ ?>

					<div class="error"><?php echo $this->mensajeError ?></div>

				<?php }elseif(!empty($this->mensajeExito)){ ?>

					<div class="error exito"><?php echo $this->mensajeExito ?></div>

				<?php } ?>
				
				<input type="submit" class="btn-registrar" value="Registrar materia">	

			</form>
			
		</div>
		
	</div>

	<?php require 'views/sidebar.php' ?>

</body>
</html>