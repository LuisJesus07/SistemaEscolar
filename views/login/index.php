<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo constant('URL') ?>public/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>

	<header class="header">

		<div class="main-header">

			

			<div class="logo">
				<a href="<?php echo constant('URL') ?>main"><img src="<?php echo constant('URL') ?>public/img/logouabcs1.png"></a>
			</div>
			
			
		</div>

	</header>

	<div class="principal-login">


		<div class="form-login">

			<h1>Login</h1>

			<form method="POST" action="<?php echo constant('URL') . 'login/iniciarSesion' ?>">
				
				<input type="text" name="correo" placeholder="Correo"><br>

				<input type="text" name="password" placeholder="Contraseña"><br>

				
				<?php if(!empty($this->mensajeError)){ ?>

					<div class="error"><?php echo $this->mensajeError; ?></div>
					
				<?php } ?>				

				<button type="submit" class="btn-registrar iniciar">Iniciar</button>

			</form>

			<div class="social social-login">

				<img src="<?php echo constant('URL') ?>public/img/logouabcs1.png">

				<div class="iconos-social">
					<a href=""><i class="fab fa-facebook-square"></i></a>
					<a href=""><i class="fab fa-twitter-square"></i></a>
				</div>
				
			</div>

				
		</div>

		<div class="fondo-login">
			
		</div>

	</div>



</body>
</html>