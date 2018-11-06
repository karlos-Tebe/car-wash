<?php

$host = "localhost";
$username = "root";
$password  ="";
$dbname = "proyecto";
$result = 0;

//Crear conexión
$conn = new mysqli ($host, $username, $password,$dbname);
//Revisar la conexión
if ($conn ->connect_error){
	die("No se puede conectar a la base de datos: ".$conn->connect_error);
}
//Obtener datos del lado del CLIENTE usando el método $_POST array
$Nombre = $_POST['Nombre'];
$Email = $_POST['Email'];
$Tema = $_POST['Tema'];
$Mensaje = $_POST['Mensaje'];
//Validar que el usuario halla ingresado datos reales
if(!$Nombre || !$Email || !$Tema ||$Mensaje){
	$result = 2;
}elseif (!strpos($Mensaje,) || !strpos($Mensaje,)){
	$result=3;
}else {
	//Ingresar datos a la tabla "users"
	$sql="insert into users (Nombre,Email,Tema,Mensaje) values(?,?,?,?) ";
	$stmt =$conn->prepare($sql);
	$stmt->bind_param('ssss',$Nombre,$Email,$Tema,$Mensaje);
	if($stmt->execute()){
		$result=1
	}
}
echo $result;
$conn->close();

?>