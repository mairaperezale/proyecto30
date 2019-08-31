<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>elimina-cliente</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
<div id="contenedor">
<div id="encabezado">
<a href=cerrar_sesion.php><img src="imagen/cerrar.png" border="0%" width="22%"  height="8%"   hspace="20%" alt="logo" align="right"> </a>
<a href="menu.php"><img src="imagen/volver.jpg" width="5%" style="border: 2px solid orange" alt="ant"></a>

<h1>Elimina cliente</h1>
</div>
<div id="principal">
<?php
include_once 'conecto.php';
$cliente=$_REQUEST['id_cliente'];
$sql="select * from cliente where id_cliente='$cliente'";
$registros=mysqli_query($conn,$sql) or
                       die("Problemas en el select:".mysql_error());
if ($row=mysqli_fetch_array($registros))
{
    $sql="delete from cliente where id_cliente='$cliente'";
    mysqli_query($conn,$sql) or
    die("Problemas en el select:".mysql_error());
   echo "Cliente eliminado con exito";
    echo "<script>window.alert('Cliente eliminado  con exito!')</script>";
    echo ("<script>window.location='baja_cliente.php?'</script>");
    
}
else
{
  //echo "No existe un cliente con ese numero."."<br>";
  echo "<script>window.alert('No existe un cliente con ese numero!')</script>";
    echo ("<script>window.location='baja_cliente.php?'</script>");
    
}
mysqli_close($conn);
?>
</div>
<div id="pie">
	<div class="copyright">El uso de este sitio web implica la aceptaci&oacute;n de las 
        Pol&iacute;ticas de Privacidad de MV Travel<br>
 		 Copyright &copy; 2016 MV Travel
 	</div> <!-- Fin .copyright -->
 	<br>
 	</div>
</div>

</body>
</html>