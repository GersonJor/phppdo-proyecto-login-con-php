<?php 
	//probamos 
	//print_r($_POST);
	if(!isset($_POST["txtid"]))
		exit();


	include "conexion.php";//nos conectamos
	//recuperamos los valores del formulario
	$pat=$_POST["txtpaterno"];
	$mat=$_POST["txtmaterno"];
	$nom=$_POST["txtnombres"];
	$ep=$_POST["txtparcial"];
	$ef=$_POST["txtfinal"];
	$id=$_POST["txtid"];
	//hacemos la actualizacion
	$sql="UPDATE tblalumno SET paterno=?,materno=?,nombre=?,exparcial=?,exfinal=? WHERE id=?";
	$sentencia=$cn->prepare($sql);
	$resultado=$sentencia->execute([$pat,$mat,$nom,$ep,$ef,$id]);
	if ($resultado) {
		header("Location:index.php");
	}
	else{
		echo "<h2>Error en la insercion</h2>";
	}
?>