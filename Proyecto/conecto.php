<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$db='usu';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db);//Abre una nueva conexión al servidor de MySQL

if (!$conn) {
	die('Error de Conexión (' . mysqli_connect_errno() . ') '//Devuelve el código de error de la última llamada
			. mysqli_connect_error());
}