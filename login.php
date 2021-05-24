<!--esto lo hacemos al ultimo-->
<?php 
	session_start();
	//si existe una var de sesion llamada nombre
	if (isset($_SESSION["nombre"])) {
		header("Location:index.php");
	} 
 ?>
 <!DOCTYPE html>
 <html>
 <head>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 	<title>iniciar sesion</title>
 	<meta charset="utf-8">
	 <link rel="stylesheet" href="estilos.css">
 </head>
 <body >
 	<center>

		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-md-offset-4">
					
					<div class="account-wall">
						<h1>LOGIN</h1>
						<img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
							alt="">
						<form class="form-signin" method="post" action="proceso_login.php">
							<input type="text" name="txtusuario" class="form-control" placeholder="usuario" required autofocus>
							<input  type="password" name="txtpassword" class="form-control" placeholder="Password" required>
							<button class="btn btn-lg btn-primary btn-block" type="submit" value="inciar sesion">
								Iniciar sesion</button>
							<label style="color:white;" class="checkbox pull-left">
								<input type="checkbox" value="remember-me">
								Recordarme
							</label>
							<a href="#" class="pull-right need-help">Necesitas ayuda? </a><span class="clearfix"></span>
						</form>
					</div>
					<a href="crear_nuevo_usuario.php" class="text-center new-account">Crear nueva cuenta </a>
				</div>
			</div>
		</div>


 	</center>
 </body>
 </html>