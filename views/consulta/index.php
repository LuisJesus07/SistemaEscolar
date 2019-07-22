<!DOCTYPE html>
<html>
<head>
	<title>Vista Consulta</title>
</head>
<body>

	<?php require 'views/header.php' ?>

	<div class="opciones datos-tabla">

		<div class="panel">

		<h1>Alumnos</h1>
		<div id="respuesta"  class="center"></div>


		<table class="tabla consulta-alumno">
			<thead>
				<tr>
					<th>Matricula</th>
					<th>Nombre Alumno</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Nacimiento</th>
					<th>Sexo</th>
					<th>Grado</th>
					<th>Grupo</th>
					<th>Generacion</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>

			<tbody id="tbody-alumnos">
				<?php 
				include_once 'models/alumno.php';
				foreach ($this->alumnos as $row) {

					$alumno = new Alumno();
					$alumno = $row;
					
				
				?>
				<!--  para eliminar un nodo se nesesita conocer el padre--> 
				<tr id="fila-<?php echo $alumno->matricula ?>">
					<td><?php echo $alumno->matricula; ?></td>
					<td><?php echo $alumno->nombre." ".$alumno->apellidos; ?></td>
					<td><?php echo $alumno->direccion; ?></td>
					<td><?php echo $alumno->telefono; ?></td>
					<td><?php echo $alumno->nacimiento; ?></td>
					<td><?php echo $alumno->sexo; ?></td>
					<td><?php echo $alumno->grado; ?></td>
					<td><?php echo $alumno->grupo; ?></td>
					<td><?php echo $alumno->generacion; ?></td>
					<td><a class="btn-consulta" href="<?php echo constant('URL') . 'consulta/verAlumno/' . $alumno->matricula ?>"> <i class="fas fa-edit"></i></a></td>	
					<td><a class="btn-eliminar" data-matricula="<?php  echo $alumno->matricula ?>"><i class="fas fa-trash-alt"></i></a></td>
					
				</tr>

				<?php } ?>

			</tbody>
		</table>

		</div>

	</div>



	<script type="text/javascript" src="<?php echo constant('URL').'public/js/main.js'  ?>"></script>

</body>
</html>