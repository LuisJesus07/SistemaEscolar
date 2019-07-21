<!DOCTYPE html>
<html>
<head>
	<title>Clases</title>
</head>
<body>

	<?php require 'views/header.php' ?>

	<div class="opciones">
	
			<div class="panel">

			<h1>Clases</h1>

			<table  class="tabla consulta-alumno">
				<thead>
					<tr>
						<th>Matricula maestro</th>
						<th>Nombre Matestro</th>
						<th>Materia</th>
						<th>Grado</th>
					</tr>
				</thead>

				<tbody id="tbody-alumnos">
					<?php
						foreach ($this->clases as $row) {
							include_once 'models/clase.php';
							$clase = new Clase();
							$clase = $row;
							
						
						?>
						<!--  para eliminar un nodo se nesesita conocer el padre--> 
						<tr id="fila">
							<td><?php echo $clase->matriculaMaestro; ?></td>
							<td><?php echo $clase->nombreMaestro ." ".$clase->apellidosMaestro; ?></td>
							<td><?php echo $clase->nombreMateria; ?></td>
							<td><?php echo $clase->gradoMateria; ?></td>
						</tr>

						<?php } ?>

					

				</tbody>
			</table>

			</div>
			
		
	</div>

	<?php require 'views/sidebar.php' ?>

</body>
</html>