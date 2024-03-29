<!DOCTYPE html>
<html>
<head>
	<title>Grupos</title>
</head>
<body>

	<?php require 'views/header.php'  ?>

	<div class="opciones">

		<div class="panel">
		
		<h1>Grupos</h1>

		<form method="POST" class="busqueda" action="<?php echo constant('URL') . 'consultaGrupos/verGrupo' ?>">
			
			<!--<label>Generacion</label>
			<input type="text" name="generacion"> -->

			<label>Generacion</label>
			<select name="generacion">
				<?php
				include_once 'models/generacion.php';

				foreach($this->generaciones as $row){
					$generacion = new Generacion();
					$generacion = $row;


				?>
				<option><?php echo $generacion->generacion  ?></option>


				<?php } ?>
			</select>

			<label>Grupo</label>
			<select name="grupo">
				<?php
				include_once 'models/grupo.php';

				foreach($this->grupos as $row){

					$grupo = new Grupo();
					$grupo = $row;

				?>

				<option><?php echo $grupo->grado."°".$grupo->nombreGrupo ?></option>

			<?php } ?>

			</select>

			<input type="submit" name="" value="Ver Grupo">

			
		</form>


		<table  class="tabla">
			<thead>
				<tr>
					<th>Generacion</th>
					<th>Grado</th>
					<th>Grupo</th>
					<th>Matricula</th>
					<th>Nombre Alumno</th>
				</tr>
			</thead>

			<tbody id="tbody-alumnos">
				<?php 
				include_once 'models/alumno.php';

				if(isset($this->alumnos)){


					foreach ($this->alumnos as $row) {

						$alumno = new Alumno();
						$alumno = $row;
						
					
					?>
					<!--  para eliminar un nodo se nesesita conocer el padre--> 
					<tr id="fila">
						<td><?php echo $alumno->generacion; ?></td>
						<td><?php echo $alumno->grado; ?></td>
						<td><?php echo $alumno->grupo; ?></td>
						<td><?php echo $alumno->matricula; ?></td>
						<td><?php echo $alumno->nombre ." ".$alumno->apellidos; ?></td>
					</tr>

					<?php } ?>

				<?php }elseif(!empty($this->mensajeError)){ ?>

					<div class="error"><?php echo $this->mensajeError; ?></div>

				<?php } ?>

			</tbody>
		</table>

		</div>

	</div>

	<?php require 'views/sidebar.php'  ?>

</body>
</html>