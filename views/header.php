<?php
	
	include_once 'models/infocuenta.php';	
	$infoCuenta = $_SESSION['infoCuenta'];
	$infoCuenta = unserialize($infoCuenta);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Vista Main</title>
	<link rel="stylesheet" type="text/css" href="<?php echo constant('URL') ?>public/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>

	<header class="header">

		<div class="main-header">

			

			<div class="menu-container">



				<nav class="menu">
					<ul class="main-menu">

						<?php if($infoCuenta->privilegios == '2'){ ?>

						<li>
							<a href="<?php echo constant('URL') ?>mainalumno">Principal</a>
						</li>

						<li>
							<a href="<?php echo constant('URL') . 'consulta/verAlumno/' ?>">Mi información</a>
						</li>

						<li>
							<a href="<?php echo constant('URL') . 'consultaCalificaciones/verCalificaciones/' ?>">Mis calificaciones</a>
						</li>	

						<?php }else{ ?>	
						
						<li>
							<a href="<?php echo constant('URL') ?>main">Principal</a>
						</li>

						<li>
							<a href="<?php echo constant('URL') ?>registrar">Alumnos</a>
						</li>

						<li>
							<a href="<?php echo constant('URL') ?>maestros">Maestros</a>
						</li>

						<li>
							<a href="<?php echo constant('URL') ?>calificaciones">Calificaciones</a>
						</li>

						<?php } ?>

						<li>
							<a href="<?php echo constant('URL') ?>cerrarSesion"><i class="fas fa-sign-out-alt salir"></i></a>
						</li>

					

					</ul>

					
				</nav>

				

			</div>

			<div class="logo">

				<?php if($infoCuenta->privilegios == '2'){ ?>

				<a href="<?php echo constant('URL') ?>mainalumno"><img src="<?php echo constant('URL') ?>public/img/logouabcs1.png"></a>

				<?php }else{ ?>

				<a href="<?php echo constant('URL') ?>main"><img src="<?php echo constant('URL') ?>public/img/logouabcs1.png"></a>

				<?php } ?>	
			</div>
			
			
		</div>

	</header>

</body>
</html>