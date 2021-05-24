<?php 
	//probamos 
	//print_r($_POST);
	include "conexion.php";//nos conectamos
	//recuperamos los valores del formulario
	$pat=$_POST["txtpaterno"];
	$mat=$_POST["txtmaterno"];
	$nom=$_POST["txtnombres"];
	$ep=$_POST["txtparcial"];
	$ef=$_POST["txtfinal"];
	//hacemos la insercion
	$sql="INSERT INTO tblalumno (paterno,materno,nombre,exparcial,exfinal) Values(?,?,?,?,?)";
	$sentencia=$cn->prepare($sql);
	$resultado=$sentencia->execute([$pat,$mat,$nom,$ep,$ef]);
	if ($resultado) {
		header("Location:index.php");
	}
	else{
		echo "<h2>Error en la insercion</h2>";
	}
?>