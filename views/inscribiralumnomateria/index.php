<!DOCTYPE html>
<html>
<head>
	<title>Inscribirse Materia</title>
</head>
<body>

	<?php require 'views/header.php' ?>

	<div class="opciones">

		<div class="panel">

			<h1>Inscribirse a una clase</h1>

			<form method="POST" action="<?php echo constant('URL') .'inscribirAlumnoMateria/registrarAlumnoMateria' ?>">


				<label>Generaciones :</label>
				<select name="generacion">
					<?php
					foreach($this->generaciones as $row){
						$generacion = new Generacion();
						$generacion = $row;
					
					?>

					<option><?php echo $generacion->generacion; ?></option>

					<?php } ?>
				</select>

				<!--<input type="text" name="grupo"><br>-->
				<label>Grupo</label>
				<select name="grupo">
					<?php
						foreach($this->grupos as $row){
							$grupo = new Grupo();
							$grupo = $row;
						
					?>

					<option><?php echo $grupo->grado."°".$grupo->nombreGrupo;  ?></option>

					<?php } ?>
					
				</select><br>
		
				<label>Clase :</label>
				<select name="clase">
					<?php
					foreach($this->clases as $row){
						$clase = new Clase();
						$clase = $row;

					?>

					<option value="<?php echo $clase->idClase ?>"><?php echo $clase->nombreMateria." || Maestro: ".$clase->nombreMaestro ?></option>

				<?php } ?>
					
				</select>

				<?php if(!empty($this->mensajeError)){ ?>

					<div class="error"><?php echo $this->mensajeError; ?></div>
						
				<?php }?>

				<?php if(!empty($this->mensajeExito)){ ?>

					<div class="error exito"><?php echo $this->mensajeExito; ?></div>
						
				<?php }?>

				<input type="submit" class="btn-registrar" value="Registrar Materia">
				
			</form>
			
		</div>
		
	</div>

	<?php require 'views/sidebar.php' ?>

</body>
</html>