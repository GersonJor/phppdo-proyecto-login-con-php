<?php 
	include_once 'conexion.php';
	// en elsiguiente metodo enviamos los datos colocados por el usuario y luego hacemos una verificacion si en caso algun campo este vacio mandaremos un mensajo de "error de registras los datos"
	if(isset($_POST['iniciar'])){
		$pas=$_POST['txtpassword'];
		$pas2=$_POST['txtpassword2'];
		

		if($pas == $pas2){
			$usu=$_POST['txtusuario'];
			
            $sql="INSERT INTO tblusuario (nombreuser,password,estado) Values(?,?,'1')";
            $sentencia=$cn->prepare($sql);
            $resultado=$sentencia->execute([$usu,$pas]);
			
			echo '<script language="javascript">alert("Exito al Registrarse!!");window.location.href="login.php"</script>';
			// header("Location:login.php");
			
            
		}else{
			echo "<script> alert('ERROR! La contraseña no coinciden ');</script>";
		}


	}
?>

<!DOCTYPE html>
 <html>
 <head>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 	<title>crear nuevo usuario</title>
 	<meta charset="utf-8">
	 <link rel="stylesheet" href="estilos.css">
 </head>
 <body >
 	<center>

		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-md-offset-4">
					
					<div class="account-wall">
						<h3>Crear nueva cuenta</h3>

						<form class="form-signin" method="post" action="">
						<input type="text" name="txtusuario" class="form-control" placeholder="usuario" required autofocus>
						<input style="margin-top: 30px;" type="password" name="txtpassword" class="form-control" placeholder="Password" required>
						<input style="margin-top: 30px;" type="password" name="txtpassword2" class="form-control" placeholder="Confirme su password" required>
					<div class="col text-center btn-group">
						<a href="login.php" class="btn btn-lg btn-primary btn-inline">Cancelar </a>
						
						<input class="btn btn-lg btn-primary btn-inline " type="submit" name="iniciar" value="Crear cuenta">
					
					</div>		
						<label style="color:white;" class="checkbox pull-left">
							<input  type="checkbox" value="remember-me">
							Recordarme
						</label>
						<a href="#" class="pull-right need-help">Necesitas ayuda? </a><span class="clearfix"></span>
						</form>
					</div>
				</div>
			</div>
		</div>


 	</center>
 </body>
 </html>