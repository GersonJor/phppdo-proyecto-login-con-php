<?php 
	if(!isset($_GET["id"]))
		exit();
	include "conexion.php";
	$id=$_GET["id"];
	$sql="DELETE FROM tblalumno WHERE id=?";
	$sentencia=$cn->prepare($sql);
	$resultado=$sentencia->execute([$id]);
	
	if ($resultado) {
		header("Location:index.php");
	}
	else{
		echo "Error en la eliminacion";
	}
	
 ?>