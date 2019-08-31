<?php

session_start();
ERROR_REPORTING(E_ALL ^ E_NOTICE ^ E_WARNING);
$precio=$_GET['clave'];

include_once 'conecto.php';
 
if ($_SESSION['auth']== true)
   		{
   			$nombre=$_SESSION['usuario_nombre'];
   		}
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
<h1>Realizar Pedido</h1>
</div>
<div id="principal">
<br>
<br>
<?php
  if ($_SESSION['auth']!== true){
         echo"<a href=inicio.php><img src='imagen/iniciar.png'></a>  " ;
         echo "<a href=registrarse.php><img src='imagen/registrate.png'></a>";}

   if ($_SESSION['auth']== true && isset($_SESSION['auth'])){
   	echo "<span style='margin-left:10%'> Bienvenido/a ".$_SESSION['usuario_nombre']."          ";
  // echo"<a href=Cerrar_sesion.php><img src='imagenes/botones/cerrar_sesion.jpg'> </a>";
   
    
   	if ($_SESSION['usuario_rol']== 'admin'){
   	 echo "<a href=mostrar_producto.php><img src='imagen/admi.jpg'> </a>";	
   	}
   else{echo"<a href=carrito-de-compra.php><img src='imagen/usuario.jpg' border='0%'width=50 height=50> </a>";}
   	//header('location: Principal.php');
          }
        $sql="select * from usuario where usuario_nombre='$nombre'";
$resul = mysqli_query($conn,$sql) or die ("fallo en la consulta");
	while ($f = mysqli_fetch_array($resul) )
	{
	$correo = $f['email'];
	$nombre = $f['nombre'];
	$apellido = $f['apellido'];
	$dni = $f['dni'];
	$domicilio = $f['domicilio'];
	$telefono = $f['telefono'];
	$provincia = $f['provincia'];
	}
	
	?>
	
<form name="orden" id="orden" action="enviar.php" method="post">
<fieldset>
<legend>Información de Cliente</legend>

<label>Nombre</label>
<input type="text" name="nombre" value="<?php echo $nombre; ?>" readonly="readonly">

<label>Apellido</label>
<input type="text" name="apellido" id="apellido" value="<?php echo $apellido; ?>" readonly="readonly">

<label>Dni</label>
<input type="text" name="dni" id="dni" value="<?php echo $dni; ?>" readonly="readonly">

<label>E-mail</label>
<input type="text" name="email"  value="<?php echo $correo; ?>" readonly="readonly">

<label>Domicilio</label>
<input type="text" name="domicilio" id="domicilio" value="<?php echo $domicilio; ?>" readonly="readonly">
 <label>Telefono</label>
 <input type="text" name="telefono" id="telefono" value="<?php echo $telefono; ?>" readonly="readonly">

 <label>Provincia</label>
 <input type="text" name="provincia" id="provincia" value="<?php echo $provincia; ?>" readonly="readonly">
 
 
 <label>Código Postal</label>
 <input type="text" name="cp" id="cp" value="">
 <label>Importe:$</label>
<input type="text" name="precio" value="<?php echo $precio; ?>" readonly="readonly">
</fieldset>
<fieldset>
<legend>Forma de Pago</legend>

<label>Nombre como aparece en la tarjeta</label>
<input type="text" name="nomTarjeta" id="nomTarjeta" value="" size="60">

<label>Tarjeta</label>
<select name="tarjeta" id="tarjeta">
<option value="">Seleccionar</option>
<option value="visa">Visa</option>
<option value="master">Mastercard</option>
<option value="naranja">Naranja</option>
<option value="nativa">Nativa</option>
</select>
<label>Número de Tarjeta</label>
<input type="text" name="numtarjeta" id="numtarjeta" value"">

<label>Fecha de Vencimiento</label>

<label>Mes</label>
<select name="mes" id="mes">
<option value="1">01</option>
<option value="2">02</option> 
<option value="3">03</option> 
<option value="4">04</option> 
<option value="5">05</option> 
<option value="6">06</option> 
<option value="7">07</option> 
<option value="8">08</option> 
<option value="9">09</option>  
<option value="10">10</option> 
<option value="11">11</option> 
<option value="12">12</option> 
</select>

<label>Año</label>
<select name="anio" id="anio">
<option value="2016">2016</option>
<option value="2017">2017</option> 
<option value="2018">2018</option> 
<option value="2019">2019</option> 
<option value="2020">2010</option> 
<option value="2021">2021</option> 
<option value="2022">2022</option> 
<option value="2023">2023</option> 
<option value="2024">2024</option>  
</select>
<div align="center">
<br>
<br>
<input type="submit" name="enviar" id="enviar" value="Enviar">
<br>
<br>
</div> 
</fieldset>
</form>
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