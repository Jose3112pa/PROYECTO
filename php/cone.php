<?php
//definir los parametros para la cadena de conexion con la bd
$server="localhost";
$user="root";
$password="";
$bd="Temperatura";

$conexion=new mysqli($server, $user, $password, $bd);
$conexion->set_charset("utf8");

?>