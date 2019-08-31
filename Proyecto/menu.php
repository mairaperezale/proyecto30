<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Menu</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
<div id="contenedor">
<div id="encabezado">
<p align="right" >
<a href=cerrar_sesion.php><img src="imagen/cerrar.png" border="0%" width="22%"  height="8%"   hspace="20%" alt="logo" align="right"> </a></p>
<h1>- Menu -</h1>
</div>
<div id="principal">
<?php 
if (isset($_SESSION['auth']) && $_SESSION['auth'] == true) {
	
	if ($_SESSION['usuario_rol'] == 'admin')
 {  echo "<p class='mi-clase'>Bienvenida/o " . $_SESSION['usuario_nombre']. "<img src='imagen/admin.png' width=35 height=35 vspace='2%' hspace='15%'> </a>"."</p>";?>
		
<fieldset>
<br>
<br>
<legend>Menu del Administrador</legend>
<br>
<br>
  <ul>
        <li><a href="agregar_producto.php"><span>Alta de Producto</span></a></li>
        <li><a href="baja_producto.php"><span>Baja de Producto</span></a></li>
         <li><a href="mostrar_producto.php"><span>Mostrar Productos</span></a></li>
         <li><a href="producto_modifica.php"><span>Modificar Producto</span></a></li>
         <li><a href="ingreso-usuario.php"><span>Alta de Cliente</span></a></li>
        <li><a href="baja_cliente.php"><span>Baja de Cliente</span></a></li>
        <li><a href="cliente_modifica.php"><span>Modificar Cliente</span></a></li>  
        <li><a href="mostrar.php"><span>Mostrar Cliente</span></a></li>            
  	 <li><a href="consultas-admi.php"><span>Listado de Consultas</span></a></li>
  	 <li><a href="pedidos-admin.php"><span>Listado de Pedidos</span></a></li>     
  	 <li><a href="mostrar-pedido.php"><span>Detalle de Pedidos</span></a></li>
  	 </ul>
  	 <br>
  	 <br>
 	</fieldset>
	<?php 	}
	if ($_SESSION['usuario_rol'] == 'visita') {
	 echo "<p class='mi-clase'>Bienvenido/a " . "  " .$_SESSION['usuario_nombre']."<a href=carrito-de-compra.php><img src='imagen/carrito.jpg' width=50 border='0%'height=50 hspace='7%'> </a>"."</p>";?>
	   																				
		<fieldset>
<legend>Menu de Cliente</legend>
<br>
<br>
<br>
  <ul>
    <li><a href="mostrar_producto.php">Mostrar Destinos</a> </li> 
    </ul>
  <br>
<br>
<br>
</fieldset>
	<?php 	
		 }
	echo "</ol>";
}
?>
</div>
<br>
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