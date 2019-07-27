<!DOCTYPE html>
<html>
<head>
	<title>Consulta Credenciales</title>
</head>
<body>

	<?php require 'views/header.php' ?>

	<div class="opciones datos-tabla">

		<div class="panel">

			<h1>Credenciales</h1>

			<form method="POST" action="<?php echo constant('URL') . 'consultaCredenciales/verCredencial' ?>">
				
				<label>Matricula Alumno: </label>
				<input type="text" name="matricula">

				<input type="submit" name="" value="Buscar">

			</form>

			<?php

			if(!empty($this->credencial)){

			?>


			<div class="credencial">

				<div class="credencial-atras">

					<div class="info-atras">

						<label><strong>Direccion: </strong></label>
						<label><?php echo $this->credencial->direccion ?></label><br>

						<label><strong>Sexo: </strong></label>
						<label><?php echo $this->credencial->sexo ?></label><br>

						<label><strong>Telefono: </strong></label>
						<label><?php echo $this->credencial->telefono ?></label><br>

						<div class="firma">
							<label><strong>Firma :</strong></label>
							<label><?php echo $this->credencial->firma ?></label>
						</div>

					</div>
					
				</div>

				<div class="credencial-frente">

					<div class="info-frente">
						
						<label><strong>Ciclo Escolar: </strong></label>
						<label><?php echo $this->credencial->generacion ?></label><br>

						<label><strong>Apellidos: </strong></label>
						<label><?php echo $this->credencial->apellidos ?></label><br>

						<label><strong>Nombre: </strong></label>
						<label><?php echo $this->credencial->nombre ?></label><br>

						<label><strong>Grupo: </strong></label>
						<label><?php echo $this->credencial->grado."°".$this->credencial->grupo  ?></label>

					</div>

					<div class="foto-credencial">
						<img src="<?php echo constant('URL'). 'public/img/fotosCredencial/'. $this->credencial->rutaFoto ?>">
						<label><strong><?php echo $this->credencial->matricula ?></strong></label>
					</div>

				</div>
				
			</div>

		<?php }elseif (!empty($this->mensajeError)) {?>
			
			<div class="error"><?php echo $this->mensajeError; ?></div>

		<?php } ?>

		
			
		</div>
		
	</div>

</body>
</html>