<?php 

	session_start();
	//si no existe la variable de sesion nombre, no hay sesion iniciada
	if (!isset($_SESSION["nombre"])) {
		header("Location:login.php");
	}elseif(isset($_SESSION["nombre"]))	{
		include "conexion.php";
		$sql="select * from tblalumno  ORDER BY id ASC";
		$resultado=$cn->query($sql);

	}else{
		echo "error de inicio de sesion";
	}

	
	//guardamos con formato de objeto -> FETCH_OBJ
	//como el resultado puede ser de mas de un registro usamos-> fetchAll
	//pero si el resultado seria 1 solo  registro usamos-> fetch
	$alumnos=$resultado->fetchAll(PDO::FETCH_OBJ);
	//para probar
	//print_r($alumnos);
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		
		$select_buscar=$cn->prepare('SELECT *FROM tblalumno WHERE id LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		
		$alumnos=$select_buscar->fetchAll(PDO::FETCH_OBJ);

	}

	
?>


<!DOCTYPE html>
	<html>
	<head>
		
		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">  -->
		<!-- <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<!-- <link rel="stylesheet" href="estilos.css"> -->
		<title>Lista de alumnos</title>
	</head>


	<body>

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#" style="font-size: 35px; margin-left: 3%;">Registros</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		
				</ul>
				<form style="margin-right: 50px;" class="form-inline my-2 my-lg-0"   action=""  method="post">
					<input class="form-control mr-sm-2"  type="number" id="buscar" name="buscar" placeholder="Buscar codigo de Alumno"
					value="<?php if(isset($buscar_text)) echo $buscar_text; ?>">
					<input type="submit" style="margin-left: 10px;"  class="btn btn-outline-success my-2 my-sm-3"  name="btn_buscar" value="Buscar">
					
				
				</form>
				<ul class="navbar-nav mr-left mt-1 mt-lg-0">
					<li  class="nav-item">
						<a  style="font-size: 18px;" class="nav-link" href="#"><?php echo $_SESSION["nombre"]; ?> <span class="sr-only">(current)</span></a>
						<h6 style="margin-top: -20px; margin-bottom: -1px" class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">usuario</h6>
					</li>
					<li style="margin-right: 30px; margin-top:10px;">
						<img src="http://assets.stickpng.com/images/585e4beacb11b227491c3399.png" width=38 height=35 
								alt="">
					</li>
					<li class="nav-item">
						<a style="margin-top: 10px;" class="nav-link  " href="cerrar.php">Cerrar sesion</a>
					</li>
				</ul>
			</div>
		</nav>


		<div style="margin-top: 3%; margin-left: 10%;" class="container p-10">
			<div class="row">
				<div style="margin-left: -8%; " class="col-md-4">
					<div class="card">
						<div class="card-body">
							<form id="frmtarea">
								<div class="form-group">
									<h3>Lista de alumnos -></h3>	
								</div>
								<div class="form-group">	
								</div>
								<a href="registrar.php"  class="btn btn-success my-2 my-sm-0">Registrar alumnos</a>
							</form>
						</div>
					</div>
				</div>
				<div style="margin-left: 25%; margin-top:-11%;"  class="col-md-11">
					<table class="table table-bordered table-sm table-hover" >
						<thead class="table-dark" >
						<tr>
							<th>Codigo</th>
							<th>Apellido Paterno</th>
							<th>Apellido Materno</th>
							<th>Nombres</th>
							<th>Examen Parcial</th>
							<th>Examen Final</th>
							<th>Promedio</th>
							<th colspan="2" style="text-align: center;">Acciones</th>
					
						</tr>
						</thead>
						<?php 
							foreach ($alumnos as $dato) 
							{
						?>
							<tr>
								<td> <?php echo $dato->id ?> </td>
								<td> <?php echo $dato->paterno ?> </td>
								<td> <?php echo $dato->materno ?> </td>
								<td> <?php echo $dato->nombre ?> </td>
								<td> <?php echo $dato->exparcial ?> </td>
								<td> <?php echo $dato->exfinal ?> </td>
								<td> <?php echo ($dato->exparcial + $dato->exfinal)/2 ?> </td>
								<td> <a class="btn btn-outline-warning" href="editar.php?id=<?php echo $dato->id ?>">Editar</a> </td>
								<td> <a class="btn btn-outline-danger" href="eliminar.php?id=<?php echo $dato->id ?>">Eliminar</a> </td>

							</tr>
						<?php 
							}
						?>
						<tbody id="tareas">
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	</body>
	</html>	