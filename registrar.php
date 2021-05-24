<?php 
	include_once 'conexion.php';
	// en elsiguiente metodo enviamos los datos colocados por el usuario y luego hacemos una verificacion si en caso algun campo este vacio mandaremos un mensajo de "error de registras los datos"
	if(isset($_POST['guardar'])){
        $pat=$_POST["txtpaterno"];
        $mat=$_POST["txtmaterno"];
        $nom=$_POST["txtnombres"];
        $ep=$_POST["txtparcial"];
        $ef=$_POST["txtfinal"];
		

		if(!empty($pat) && !empty($mat) && !empty($nom) && !empty($ep) && !empty($ef)){
			
            $sql="INSERT INTO tblalumno (paterno,materno,nombre,exparcial,exfinal) Values(?,?,?,?,?)";
            $sentencia=$cn->prepare($sql);
            $resultado=$sentencia->execute([$pat,$mat,$nom,$ep,$ef]);
            header("Location:index.php");	
		}else{
			echo "<script> alert('ERROR!  Debe llenar todos los campos ');</script>";
		}

	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Alumno</title>
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
	
	<div class="container p-20" style="margin-top: 20px; margin-left: 30%; ">
		<div class="row">
			<div class="col-md-5">
				<div class="card">
					<div class="card-body">
						<form id="frmtarea"  action="" method="post" >
							<div class="form-group">
								<h3 style="text-align: center;">Registrar nuevo Alumno</h3>
								<h5 style="margin-top: 20px;">Apellido paterno del estudiante: </h5>
								<input type="text" name="txtpaterno" placeholder="apellido paterno" class="form-control" >
								<h5 style="margin-top: 20px;">Apellido materno del estudiante: </h5>							
								<input type="text" name="txtmaterno" placeholder="apellido materno" class="form-control">
							</div>
							<div class="form-group">
								<h5 style="margin-top: 20px;">Nombres: </h5>
								<input type="text" name="txtnombres" placeholder="Nombres" class="form-control">
								<h5 style="margin-top: 20px;">Nota de examen parcial: </h5>
								<input type="text" name="txtparcial" placeholder="nota examen parcial" class="form-control">
                                <h5 style="margin-top: 20px;">Nota de examen final: </h5>
								<input type="text" name="txtfinal" placeholder="nota examen final" class="form-control">
							</div>
							<div class="col text-center btn-group">
								<a href="index.php" class="btn btn-success my-2 my-sm-0 bg-dark">Cancelar</a>
								<input type="submit" name="guardar" value="Guardar" class="btn btn-success my-2 my-sm-0 bg-success">
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
