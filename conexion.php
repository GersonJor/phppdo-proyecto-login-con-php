<?php 
	//CRUD CON PHP y MYSQL UTILIZANDO PDO
	//variables de conexion
	$password="";			//para mysql es senati   		para postgres es senati
	$usuario="root";		// para mysql es root       para sqlserver es sa 		para porstgres es postgres
	$basedatos="bdcalificaciones";
	try {
		$cn=new PDO("mysql:host=localhost;dbname=".$basedatos,$usuario,$password);
		//$cn = new PDO("pgsql:host=localhost;port=5432;dbname=".$basedatos, $usuario, $password);
		//$cn= new PDO('sqlsrv:Server=localhost;Database=bdcalificaciones',$usuario,$password);
		
		
	} catch (Exception $e) {
		echo "Error en la conexion:" , $e->getMessage();
	}
 ?>
