<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$db='usu';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db);//Abre una nueva conexi�n al servidor de MySQL

if (!$conn) {
	die('Error de Conexi�n (' . mysqli_connect_errno() . ') '//Devuelve el c�digo de error de la �ltima llamada
			. mysqli_connect_error());
}