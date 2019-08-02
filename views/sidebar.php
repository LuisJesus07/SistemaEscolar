<?php
	
	include_once 'models/infocuenta.php';	
	$infoCuenta = $_SESSION['infoCuenta'];
	$infoCuenta = unserialize($infoCuenta);

?>
<div class="admin-info">

			<img src="<?php echo constant('URL') . 'public/img/fotosCredencial/'. $infoCuenta->rutaFoto ?>">

			<div class="info-cuenta">
				
				<div class="info-cuenta-cabecera">Tipo cuenta: </div>

				<?php if($infoCuenta->privilegios == '1'){ ?>

				<div class="info-cuenta-cabecera informacion">Administrador</div>

				<?php }else{ ?>

				
				<div class="info-cuenta-cabecera informacion">Alumno</div>
				
				<?php } ?>

				<div class="info-cuenta-cabecera">Nombre: </div>
				<div class="info-cuenta-cabecera informacion"><?php echo $infoCuenta->nombre." ".$infoCuenta->apellidos ?></div>

				<div class="info-cuenta-cabecera">Correo: </div>
				<div class="info-cuenta-cabecera informacion"><?php echo $infoCuenta->correo ?></div>

			</div>


			<div class="social">

				<img src="<?php echo constant('URL') ?>public/img/logouabcs1.png">

				<div class="iconos-social">
					<a href=""><i class="fab fa-facebook-square"></i></a>
					<a href=""><i class="fab fa-twitter-square"></i></a>
				</div>
				
			</div>
			
</div>