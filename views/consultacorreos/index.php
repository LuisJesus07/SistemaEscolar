<!DOCTYPE html>
<html>
<head>
	<title>Consulta Correos</title>
</head>
<body>

	<?php require 'views/header.php' ?>

	<div class="opciones">

		<div class="panel">

			<h1>Correos</h1>

			<table  class="tabla consulta-alumno">
				<thead>
					<tr>
						<th>Matricula</th>
						<th>Nombre Alumno</th>
						<th>Correo</th>
					</tr>
				</thead>

				<tbody id="tbody-alumnos">
					<?php
						foreach ($this->correos as $row) {
							$alumno = new Alumno();
							$alumno = $row;
							
						
						?>
						<!--  para eliminar un nodo se nesesita conocer el padre--> 
						<tr id="fila">
							<td><?php echo $alumno->matricula; ?></td>
							<td><?php echo $alumno->nombre ." ".$alumno->apellidos; ?></td>
							<td><?php echo $alumno->correo; ?></td>
						</tr>

						<?php } ?>

					

				</tbody>
			</table>
			
		</div>
		
	</div>


	<?php require 'views/sidebar.php' ?>

</body>
</html>