<?php
	
	include_once 'models/infocuenta.php';	
	$infoCuenta = $_SESSION['infoCuenta'];
	$infoCuenta = unserialize($infoCuenta);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Mi cuenta</title>
</head>
<body>

	<?php require 'views/header.php' ?>

	<div class="opciones">

		<div class="panel">

			<h1>Mi cuenta</h1>

			<form method="POST" action="<?php echo constant('URL') . 'micuenta/actualizarPassword/'. $infoCuenta->correo ?>">

				<label>Correo :</label>
				<label><?php echo $infoCuenta->correo ?></label><br>

				<label>Ingrese su contraseña actual: </label>
				<input type="text" name="passwordActual"><br>

				<label>Ingrese su nueva contraseña: </label>
				<input type="text" name="passwordNueva1"><br>

				<label>Repita su nueva contraseña: </label>
				<input type="text" name="passwordNueva2">

				<?php if(!empty($this->mensajeError)){ ?>

					<div class="error"><?php echo $this->mensajeError; ?></div>
						
				<?php }?>

				<?php if(!empty($this->mensajeExito)){ ?>

					<div class="error exito"><?php echo $this->mensajeExito; ?></div>
						
				<?php }?>

				<input type="submit" class="btn-registrar" value="Actualizar">

			</form>


			
		</div>
		
	</div>

	<?php require 'views/sidebar.php'?>

</body>
</html>