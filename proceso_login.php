<?php 
	session_start();
	//probar con print_r($_POST);
	//nos conectamos
	include "conexion.php";
	//capturamos valores
	$user=$_POST["txtusuario"];
	$password=$_POST["txtpassword"];
	$sql="Select * from tblusuario where nombreuser=? and password=?";
	$sentencia=$cn->prepare($sql);
	$sentencia->execute([$user,$password]);
	$usuario=$sentencia->fetch(PDO::FETCH_OBJ);
	//probamos con print_r($usuario);
	if(!$usuario)
		header("Location:login.php");
	elseif ($sentencia->rowCount()==1) {
		//si hay 1 resultado o fila creamos la sesion
		//para probar echo $_SESSION["nombre"]=$usuario->nombreuser;
		$_SESSION["nombre"]=$usuario->nombreuser; 
		header("Location:index.php");	
	}
 ?>