<?php
	
	include_once 'models/infocuenta.php';	
	$infoCuenta = $_SESSION['infoCuenta'];
	$infoCuenta = unserialize($infoCuenta);

?>
<div class="admin-info">

			<img src="<?php echo constant('URL') . 'public/img/fotosCredencial/'. $infoCuenta->rutaFoto ?>">

			<?php if($infoCuenta->privilegios == '1'){ ?>

			<p>Administrador</p>

			<?php }else{ ?>

			<p>Alumno</p>
			
			<?php } ?>

			<p><?php echo $infoCuenta->nombre ?></p>
			<p><?php echo $infoCuenta->correo ?></p>


			<div class="social">

				<img src="<?php echo constant('URL') ?>public/img/logouabcs1.png">

				<div class="iconos-social">
					<a href=""><i class="fab fa-facebook-square"></i></a>
					<a href=""><i class="fab fa-twitter-square"></i></a>
				</div>
				
			</div>
			
</div>