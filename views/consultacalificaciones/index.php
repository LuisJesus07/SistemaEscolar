<!DOCTYPE html>
<html>
<head>
	<title>Consulta Calificaciones</title>
</head>
<body>

	<?php require 'views/header.php'  ?>

	<div class="opciones datos-tabla">

		<div class="panel">

		<h1>Ver Calificaciones</h1>

		<form method="POST" class="busqueda-calificaciones" action="<?php echo constant('URL'). 'consultaCalificaciones/verCalificaciones' ?>">

			<label>Matricula</label>
			<input type="text" name="matricula">

			<input type="submit" name="" value="Ver calificaciones">
			
		</form>


		<table  class="tabla tabla-calif">
			<thead>
				<tr>
					<th>Generacion</th>
					<th>Grado</th>
					<th>Grupo</th>
					<th>Matricula</th>
					<th>Nombre Alumno</th>
					<th>Materia</th>
					<th>Maestro</th>
					<th>Primer Bimestre</th>
					<th>Segundo Bimestre</th>
					<th>Tercer Bimestre</th>
					<th>Cuarto Bimestre</th>
					<th>Quinto Bimestre</th>
				</tr>
			</thead>

			<tbody id="tbody-alumnos">
				<?php 
				//include_once 'models/alumno.php';

				if(isset($this->calificaciones)){


					foreach ($this->calificaciones as $row) {

						$calificacion = new Calificacion();
						$calificacion = $row;
						
					
					?>
					<!--  para eliminar un nodo se nesesita conocer el padre--> 
					<tr id="fila">
						<td><?php echo $calificacion->generacion; ?></td>
						<td><?php echo $calificacion->grado; ?></td>
						<td><?php echo $calificacion->nombreGrupo; ?></td>
						<td><?php echo $calificacion->matricula; ?></td>
						<td><?php echo $calificacion->nombre." ".$calificacion->apellidos; ?></td>
						<td><?php echo $calificacion->nombreMateria; ?></td>
						<td><?php echo $calificacion->nombreMaestro; ?></td>
						<td><?php echo $calificacion->primerBimestre; ?></td>
						<td><?php echo $calificacion->segundoBimestre; ?></td>
						<td><?php echo $calificacion->tercerBimestre; ?></td>
						<td><?php echo $calificacion->cuartoBimestre; ?></td>	
						<td><?php echo $calificacion->quintoBimestre; ?></td>				
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