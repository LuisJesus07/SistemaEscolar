<!DOCTYPE html>
<html>
<head>
	<title>Detalle maestro</title>
</head>
<body>

	<?php require 'views/header.php' ?>;

	<div class="opciones">

		<h1>Editar al maestro(a) <?php echo $this->maestro->nombre ?></h1>

		<form method="POST" action="<?php echo constant('URL') .'consultaMaestros/actualizarMaestro' ?>">

			<h3><?php echo $this->mensaje; ?></h3>

			<p>
				<label>Matricula: </label>
				<input type="text" name="matricula" disabled value="<?php echo $this->maestro->matricula ?>">
			</p>
			
			<p>
				<label>Nombre: </label>
				<input type="text" name="nombre" value="<?php echo $this->maestro->nombre ?>">
			</p>

			<p>
				<label>Apellidos: </label>
				<input type="text" name="apellidos" value="<?php echo $this->maestro->apellidos ?>">
			</p>

			<p>
				<label>Direccion: </label>
				<input type="text" name="direccion" value="<?php echo $this->maestro->direccion ?>">
			</p>

			<p>
				<label>Telefono: </label>
				<input type="text" name="telefono" value="<?php echo $this->maestro->telefono ?>">
			</p>

			<p>
				<label>Nacimiento: </label>
				<input type="date" name="nacimiento" value="<?php echo $this->maestro->nacimiento ?>">
			</p>

			<p>
				<label>Sexo: </label>
				<input type="text" name="sexo" value="<?php echo $this->maestro->sexo ?>">
			</p>





			<input type="submit" name="" value="Actualizar maestro">
		</form>
		
	</div>


	<?php require 'views/sidebar.php' ?>;


</body>
</html>