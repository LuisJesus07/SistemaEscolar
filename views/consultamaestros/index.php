<!DOCTYPE html>
<html>
<head>
	<title>Consulta Maestros</title>
</head>
<body>

	<?php require 'views/header.php' ?>

	<div class="opciones">
		<h1>Maestros</h1>
		<div id="respuesta"  class="center"></div>


		<table style="width: 100%">
			<thead>
				<tr>
					<th>Matricula</th>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Nacimiento</th>
					<th>Sexo</th>
				</tr>
			</thead>

			<tbody id="tbody-alumnos">
				<?php 
				include_once 'models/maestro.php';
				foreach ($this->maestros as $row) {

					$maestro = new Maestro();
					$maestro = $row;
					
				
				?>
				<!--  para eliminar un nodo se nesesita conocer el padre--> 
				<tr id="fila-<?php echo $maestro->matricula ?>">
					<td><?php echo $maestro->matricula; ?></td>
					<td><?php echo $maestro->nombre; ?></td>
					<td><?php echo $maestro->apellidos; ?></td>
					<td><?php echo $maestro->direccion; ?></td>
					<td><?php echo $maestro->telefono; ?></td>
					<td><?php echo $maestro->nacimiento; ?></td>
					<td><?php echo $maestro->sexo; ?></td>
					<td><a href="<?php echo constant('URL') . 'consultaMaestros/verMaestro/' . $maestro->matricula ?>"> Editar</a></td>	
					<td><button class="btn-eliminar" data-rol="maestro" data-matricula="<?php  echo $maestro->matricula ?>">Eliminar</button></td>
					
				</tr>

				<?php } ?>

			</tbody>
		</table>

	</div>


	<?php require 'views/sidebar.php' ?>

	<script type="text/javascript" src="<?php echo constant('URL') ?>public/js/main.js"></script>

</body>
</html>