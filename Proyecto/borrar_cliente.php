
<?php
//session_set_cookie_params(0,"/");
include_once 'conecto.php';
//$hoy = date("Y-m-d");
session_start();

ERROR_REPORTING(E_ALL ^ E_NOTICE ^ E_WARNING);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Borrar cliente</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
<div id="contenedor">
<div id="encabezado">
<a href=cerrar_sesion.php><img src="imagen/cerrar.png" border="0%" width="22%"  height="8%"   hspace="20%" alt="logo" align="right"> </a>
<a href="menu.php"><img src="imagen/volver.jpg" width="5%" style="border: 2px solid orange" alt="ant"></a>

<h1>Borrar Cliente</h1>
</div>
<div id="principal">

<FORM ACTION="" method="POST">
<?php   
$dni=$_GET['dni'];
    if (!$conn)
    return "No se puede conectar al servidor de la base de datos - por favor inténtalo más tarde.";
    $query=("DELETE FROM cliente where dni = '$dni'" ); 
    $sql = mysqli_query($conn,$query); 
	   
   if(!$sql)
	 echo "No se puede conectar al servidor de la base de datos ";
    else {
	$nombreDirectorio="../IMG/";
	$nombreFichero= $dni.".jpg";
	$fichero=$nombreDirectorio.$nombreFichero;
	if(file_exists($fichero)) {
    unlink ($fichero);}

?>
</form>
<form action="cliente_borrar.php" method="GET" name="aviso">
  <table border="1">
    <tr>
    <td colspan ="2"><div align="center">EL cliente HA SIDO ELIMINADO EXITOSAMENTE 
          <input name="ACEPTAR" type="submit" value="ACEPTAR">
        </div></td>
  </tr>
</table>
</form>
</div>
</div>
</body>
</html>
<?php 
} mysqli_close($conn);
?>
