<!DOCTYPE html>
<html>
<head>
	<title>Registrar Calificacion</title>
</head>
<body>

	<?php require 'views/header.php'; ?>

	<div class="opciones datos-tabla">

		<div class="panel">

			<h1>Registrar Calificacion</h1>

			<form method="POST" action="<?php echo constant('URL'). 'calificaciones/verAlumnosMateria' ?>">
				<label>Ingrese la genreracion,el grupo y la materia</label><br>

				<label>Generacion</label>
				<select name="generacion">
					<?php
						foreach($this->generaciones as $row){
							$generacion = new Generacion();
							$generacion = $row;

					?>

					<option><?php echo $generacion->generacion ?></option>

					<?php } ?>
					
				</select>

				<!--<label>Grado</label>
				<input type="text" name="grado"><br>

				<label>Grupo</label>
				<input type="text" name="nombreGrupo">-->

				<label>Grupo</label>
				<select name="grupo">
					<?php
						foreach($this->grupos as $row){
							$grupo = new Grupo();
							$grupo = $row;
						
					?>

					<option><?php echo $grupo->grado."°".$grupo->nombreGrupo;  ?></option>

					<?php } ?>
					
				</select>

				<label>Materia</label>
				<select name="materia">
					<?php
						foreach($this->materias as $row){
							$materia = new Materia();
							$materia = $row;
						
					?>

					<option><?php echo $materia->nombreMateria; ?></option>

					<?php } ?>
					
				</select>

				<input type="submit" name="" value="Ver Materia">
				
			</form>

			<?php 

				if(isset($this->alumnosMateria)){
			?>

			<div class="panel datos-materia">

				<h2>Materia</h2>

				<label><strong> Generacion :</strong></label>
				<label><?php echo $this->generacion; ?></label>

				<label><strong> Grupo :</strong></label>
				<label><?php echo $this->grado."°". $this->nombreGrupo; ?></label><br>


				<label><strong> Materia :</strong></label>
				<label><?php echo $this->materia; ?></label>

				<?php 
					foreach($this->alumnosMateria as $row){
					$alumno = new Calificacion();
					$alumno = $row;

				?>

					<label><strong> Maestro(a) :</strong></label>
					<label><?php echo $alumno->nombreMaestro." ". $alumno->apellidosMaestro; ?></label>

				<?php break; } ?>

				
			</div>


			<table  class="tabla">
			<thead>
				<tr>
					<th>Matricula</th>
					<th>Nombre Alumno</th>
					<th>Modificar</th>
					
				</tr>
			</thead>

			<tbody id="tbody-alumnos">

					<?php foreach ($this->alumnosMateria as $row) {

						$alumno = new Calificacion();
						$alumno = $row;
						
					
					?>
				
					<!--  para eliminar un nodo se nesesita conocer el padre--> 
					<tr id="fila">
						<td><?php echo $alumno->matricula; ?></td>
						<td><?php echo $alumno->nombre." ".$alumno->apellidos; ?></td>
						<td><a class="btn-consulta" href="<?php echo constant('URL') . 'calificaciones/verAlumnoMateria/' . $alumno->idCalificacion .'/'. $alumno->nombre ?>"> <i class="fas fa-edit"></i></a></td>
										
					</tr>

					<?php } ?>

					

				<?php }elseif(!empty($this->mensajeError)){ ?>

					<div class="error"><?php echo $this->mensajeError; ?></div>

				<?php } ?>

			</tbody>
		</table>

	
			
		</div>
		
	</div>

</body>
</html>