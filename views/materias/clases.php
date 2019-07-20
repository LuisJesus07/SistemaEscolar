<!DOCTYPE html>
<html>
<head>
	<title>Registrar Clase</title>
</head>
<body>

	<?php require 'views/header.php' ?>

	<div class="opciones">

		<div class="panel">

			<h1>Registrar Clase</h1>

			<form method="POST" action="<?php echo constant('URL') . 'materias/registrarClase' ?>">
				
				<label>Materia: </label>
				<select name="materiaClase">
				<?php  
					//include_once 'models/materia.php';

					foreach($this->materias as $row){

						$materia = new Materia();
						$materia = $row;

				?>

					<option value="<?php echo $materia->idMateria  ?>"><?php echo $materia->nombreMateria ." || Grado: ". $materia->grado ; ?></option>

				<?php } ?>
					
				</select><br>

				<label>Maestro: </label>
				<select name="maestroClase">
				<?php
					foreach($this->maestros as $row){
						$maestro = new Maestro();
						$maestro = $row; 
				?>

					<option value="<?php echo $maestro->idProfesor ?>"><?php echo $maestro->nombre." ". $maestro->apellidos ?></option>

				<?php } ?>
				</select>

				<?php if(!empty($this->mensajeError)){ ?>

					<div class="error"><?php echo $this->mensajeError ?></div>

				<?php }elseif(!empty($this->mensajeExito)){ ?>

					<div class="error exito"><?php echo $this->mensajeExito ?></div>

				<?php } ?>

				<input type="submit" class="btn-registrar" value="Registrar Clase">

			</form>
			
		</div>
		
	</div>

	<?php require 'views/sidebar.php' ?>

</body>
</html>