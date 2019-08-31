<?php
session_set_cookie_params(0,"/");
include_once 'conecto.php';
$hoy = date("Y-m-d");
session_start();// iniciar la sesion
ERROR_REPORTING(E_ALL ^ E_NOTICE ^ E_WARNING);

/* * este script agrega el producto seleccionado al carrito */
require_once 'productos.php';// inlcuir el array de productos 
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Carrito</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
<div id="contenedor">
<div id="encabezado">
<p align="right" >
<a href=cerrar_sesion.php><img src="imagen/cerrar.png" border="0%" width="22%"  height="8%"   hspace="20%" alt="logo" align="right"> </a></p>
<a href="menu.php"><img src="imagen/volver.jpg" width="5%" style="border: 2px solid orange" alt="ant"></a>
<h1>CARRITO DE COMPRAS</h1>
</div>
<div id="principal">
<?php
   if ($_SESSION['auth']!== true){
         echo"<a href=inicio.php><img src='imagen/iniciar.png'></a>  " ;
         echo "<a href=registrarse.php><img src='imagen/registrate.png'> </a>";
   }

   if ($_SESSION['auth']== true && isset($_SESSION['auth'])){ 	
   	echo "<br>.<span style='margin-left:10%'>Bienvenido/a ".$_SESSION['usuario_nombre']."     "."<img src='imagen/usuario.jpg' width=35 height=35>.<br>";
     	
   }            
?>

<fieldset >
<legend >Carrito</legend>
<!--  tabla para mostrar los productos en el carrito -->
<table id="tabla_carrito" align="center" border="2" width="50%" bgcolor="#F6EFEF" >
<tr>
<td bgcolor="#9F9393">Producto</td>
<td bgcolor="#9F9393">Cantidad</td>
<td bgcolor="#9F9393">Importe</td>
<td bgcolor="#9F9393">Accion</td>
</tr>
<?php 
//si el carrito esta vacio entonces poner importe total en cero
if (empty($_SESSION['carrito'])) {
	$_SESSION['importe_total'] = 0;	
	echo "<tr>\n";
	echo "<td colspan='5'>El carrito esta vacio.</td>\n";
	echo "</tr>\n";
}
else {
	foreach ($_SESSION['carrito'] as $clave => $valor) {
		echo "<tr>\n";
		echo "<td>" . $valor['nombre'] . "</td>\n";
		echo "<td>" . $valor['cantidad'] . "</td>\n";
		echo "<td>$" . $valor['cantidad'] * $valor['precio'] . "</td>\n";
		/*
	 * el id de producto (clave) se pasara por la URL hacia el script 
	 * eliminar el producto.php, recordar la forma de pasar variables por la URL
	 *  nombre_de_la_pagina.php?nombre_variable=valor_de_la_variable
	 * */
		echo "<td><a href='eliminar-producto.php?clave=" . $clave . "'><img src='imagen/delete.png' width:'5px' style='border: 2px solid black' alt='eliminar'></a></td>\n";
		echo "</tr>\n";
		$importe_total+= $valor['cantidad'] * $valor['precio'];
		echo "<br>";
	}
	if ($_SESSION['importe_total']!=0 ){
		$_SESSION['importe_total'] = $importe_total; }
		else {$_SESSION['importe_total']=0;}
}
?>
</table>
</fieldset>
<fieldset >
<?php  echo "<h3>Importe Total:&nbsp;$" .$importe_total. "</h3>" ?>

<ul>
<li><a href="catalogo-de-producto.php"><img src="imagen/agre.png" width="15%" border="0%"height="10%" hspace="8%" alt="logo">Mas Productos</a></li>
<li><a href="vaciar-carrito.php"><img src="imagen/vac.png" width="15%" height="5%" border="0%" hspace="8%" alt="Icono Vaciar Carrito">Vaciar Carrito</a></li>
<li><?php echo"<a href='orden.php?clave=" .$importe_total."'><img src='imagen/orden.png' border='0%' width='15%' hspace='8%'  height='7%' alt='logo'>Ordenar</a>";
?></li>
</ul>

</fieldset>
</div>
<div id="pie">
	<div class="copyright">El uso de este sitio web implica la aceptaci&oacute;n de las 
        Pol&iacute;ticas de Privacidad de MV Travel<br>
 		 Copyright &copy; 2016 MV Travel
 	</div> 
 	<br>
 	</div>
 	</div>
</body>
</html>