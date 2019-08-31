<?php

session_start();
ERROR_REPORTING(E_ALL ^ E_NOTICE ^ E_WARNING);
require_once 'conecto.php';//conecto con la base de datos
require_once 'productos.php';//inlcuir el array de productos 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>catalogo de productos</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
<div id="contenedor">
<div id="encabezado">
<p align="right" >
<a href=cerrar_sesion.php><img src="imagen/cerrar.png" border="0%" width="22%"  height="8%"   hspace="20%" alt="logo" align="right"> </a></p>
<a href="menu.php"><img src="imagen/volver.jpg" width="5%" style="border: 2px solid orange" alt="ant"></a>
<h1>Catalogo de Productos</h1>
</div>
<div id="principal">
<?php
   if ($_SESSION['auth']!== true){
         echo"<a href=inicio.php><img src='imagen/iniciar.png'  width='12%'  height='8%'  border='0%' hspace='20%' alt='logo' align='left'> </a> ";
         echo "<a href=registrarse.php><img src='imagen/registrate.png' width='14%'  border='0%' height='8%'  align='left' alt='logo'></a>"."<br>"."<br>";}

   if ($_SESSION['auth']== true && isset($_SESSION['auth'])){
   	echo "<span style='margin-left:10%'> Bienvenido/a ".$_SESSION['usuario_nombre']."          ";
  // echo"<a href=Cerrar_sesion.php><img src='imagenes/botones/cerrar_sesion.jpg'> </a>";
   
     
   	if ($_SESSION['usuario_rol']== 'admin'){
   	 echo "<a href=mostrar_producto.php><img src='imagen/admi.jpg'> </a>";	
   	}
   else{echo"<a href=carrito-de-compra.php><img src='imagen/usuario.jpg' width=50 border='0%' height=50> </a>";}
   	//header('location: Principal.php');
   }            
?>
<div>
<br><br></div>
 <?php
 /*
 * recorrer el array de productos para 
 * crear la lista de productos que agregaré al carrito 
 */
foreach ($productos as $clave => $valor) {
 	
  	$foto="IMG/".$valor['imagen'];
    echo "<fieldset  style='background-color: #ffffff;'> <br></br>";
    echo "<p> <img align='right' src='".$foto."' width=250 height=200/>";
	echo "<b>Nombre: </b>".$valor['nombre']."<br> <br>";
	echo "<b>Descripcion: </b>".$valor['descripcion']." <br> <br>";
	echo "<b>Precio: </b> $".$valor['precio']." <br> <br>";
	
     /* el id de producto (clave) se pasara por la URL hacia el script 
	 * agregar_producto.php
	 * recordar la forma de pasar variables por la URL
	 *  nombre_de_la_pagina.php?nombre_variable=valor_de_la_variable
	 * */
     echo "<td><a href='alta-producto.php?clave=". $clave ."'><img src='imagen/comprar.jpg' border='0%' width='20%' height='10%' ></a></td>\n";
	//else{
	// echo "<i><b>Necesita estar registrado para poder comprar</b></i>"; }
	echo "</fieldset> <br><br>";}
  ?>
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