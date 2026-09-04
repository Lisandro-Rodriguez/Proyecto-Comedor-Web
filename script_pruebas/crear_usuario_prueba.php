<?php

require_once("config/conexion.php");

$dni=44136272;
$nombre="lisandro";
$apellido="rodriguez";
$email = "liisprex@gmail.com";
$estado= 0;
$id_beca = 1;
$id_localidad = 1;
$con=123456;
$pass= password_hash($con,PASSWORD_DEFAULT);


$stmt = $pdo->prepare("INSERT INTO usuarios (dni,nombre,apellido,id_localidad,email,contraseña,estado,id_beca) VALUES ( :dni,:nombre,:apellido,:id_localidad,:email,:pass,:estado,:id_beca)");
$stmt->bindParam(':dni',$dni);
$stmt->bindParam(':nombre',$nombre);
$stmt->bindParam(':apellido',$apellido);
$stmt->bindParam(':pass',$pass);
$stmt->bindParam(':id_beca',$id_beca);
$stmt->bindParam(':id_localidad',$id_localidad);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':estado',$estado);


$stmt->execute();

echo("Todo ok");
?>