<?php 
	session_start();
	if (!isset($_GET["id"])) {
		header("Location:index.php");
	}
	if (!isset($_SESSION["nombre"])) {
		header("Location:login.php");
	}elseif (isset($_SESSION["nombre"])) {
		$id=$_GET["id"];
		include "conexion.php";
		$sql="Select * from tblalumno where id=?";
		$sentencia=$cn->prepare($sql);
		$sentencia->execute([$id]);
		$alumno=$sentencia->fetch(PDO::FETCH_OBJ);
	}else{
		echo "Error de sesion.";
	}


	//print_r($alumno);
?>



<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
	<title>Editar alumnos</title>
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>

	<div class="container p-20" style="margin-top: 20px; margin-left: 30%; ">
		<div class="row">
			<div class="col-md-5">
				<div class="card">
					<div class="card-body">
						<form id="frmtarea" method="post" action="proceso_editar.php"  >
							<div class="form-group">
								<h3 style="text-align: center;">Editar alumno: <?php echo $alumno->nombre ?></h3>
								<h5 style="margin-top: 20px;">Apellido paterno del estudiante: </h5>
								<input type="text" name="txtpaterno" value="<?php echo $alumno->paterno ?>" class="form-control" >
								<h5 style="margin-top: 20px;">Apellido materno del estudiante: </h5>							
								<input type="text" name="txtmaterno" value="<?php echo $alumno->materno ?>" class="form-control">
							</div>
							<div class="form-group">
								<h5 style="margin-top: 20px;">Nombres: </h5>
								<input type="text" name="txtnombres" value="<?php echo $alumno->nombre ?>" class="form-control">
								<h5 style="margin-top: 20px;">Nota de examen parcial: </h5>
								<input type="text" name="txtparcial" value="<?php echo $alumno->exparcial  ?>" class="form-control">
                                <h5 style="margin-top: 20px;">Nota de examen final: </h5>
								<input type="text" name="txtfinal" value="<?php echo $alumno->exfinal ?>" class="form-control">
								<td><input type="hidden" name="txtid" value="<?php echo $alumno->id ?>"></td>
							</div>
							<div class="col text-center btn-group">
								<a href="index.php" class="btn btn-success my-2 my-sm-0 bg-dark">Cancelar</a>
								<input type="submit" value="Modificar Alumno" class="btn btn-success my-2 my-sm-0 bg-success">
								
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>