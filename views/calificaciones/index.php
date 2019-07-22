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
				<input type="text" name="generacion">

				<label>Grado</label>
				<input type="text" name="grado"><br>

				<label>Grupo</label>
				<input type="text" name="nombreGrupo">

				<label>Materia</label>
				<input type="text" name="materia">

				<input type="submit" name="" value="Ver Materia">
				
			</form>

			<?php 

				if(isset($this->alumnosMateria)){
			?>

			<div class="datos-materia">

				<label>Generacion :</label>
				<label><?php echo $this->generacion; ?></label>

				<label>Grado :</label>
				<label><?php echo $this->grado; ?></label><br>

				<label>Grupo :</label>
				<label><?php echo $this->nombreGrupo; ?></label>

				<label>Materia :</label>
				<label><?php echo $this->materia; ?></label>
				
			</div>


			<table  class="tabla tabla-calif">
			<thead>
				<tr>
					<th>idCalificacion</th>
					<th>Matricula</th>
					<th>Nombre Alumno</th>
					<th>Maestro</th>
					<th>Ver</th>
					
				</tr>
			</thead>

			<tbody id="tbody-alumnos">

					<?php foreach ($this->alumnosMateria as $row) {

						$alumno = new Calificacion();
						$alumno = $row;
						
					
					?>
				
					<!--  para eliminar un nodo se nesesita conocer el padre--> 
					<tr id="fila">
						<td><?php echo $alumno->idCalificacion; ?></td>
						<td><?php echo $alumno->matricula; ?></td>
						<td><?php echo $alumno->nombre." ".$alumno->apellidos; ?></td>
						<td><?php echo $alumno->nombreMaestro; ?></td>
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