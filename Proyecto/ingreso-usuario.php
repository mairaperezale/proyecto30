<?php 
include_once 'conecto.php';
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Ingreso Cliente</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
<div id="contenedor">
<div id="encabezado">
<a href=cerrar_sesion.php><img src="imagen/cerrar.png" border="0%" width="22%"  height="8%"   hspace="20%" alt="logo" align="right"> </a>
<a href="menu.php"><img src="imagen/volver.jpg" width="5%" style="border: 2px solid orange" alt="ant"></a>
<h1>Alta Cliente</h1>
</div>
<div id="principal">
 <?php 
//preparo laconsulta sql
  $query ="SELECT * FROM cliente"; 
  $sql= mysqli_query($conn,$query)or die ("fallo en la consulta"); 
  //$sql funcion que maneja el resultado de las tablas
//recupero una fila de resultados como un array asociativo, un array numerico o como ambos 
//el tipo de array a ser devuelto depende de la constante (MYSQL_BOTH, NUM O ASSOC)
//MYSQL_BOTH recupera un array con ambos indices asociativos y numericos
  $usuario = mysqli_fetch_array($sql,MYSQLI_BOTH);
  $row=mysqli_fetch_row($sql);//selecciona una fila para mostrar 
  ?>
<form method="post"  action="guardar-usuario.php" ENCTYPE="multipart/form-data">
<br><br>
<fieldset >
	<legend> Datos Cliente</legend>
	<label><b>Nombre:</b></label>
	<input name="nombre_cliente" id="nombre_cliente" size="30"><br><br>
	<label><b>Dni:</b></label>
   <input name="dni_cliente" id="dni_cliente" size="30"><br><br>
	
	<label><b>Apellido:</b></label>
	<input name="apellido_cliente" id="apellido_cliente" size="30"><br><br>
	   
    <label><b>E-mail:</b></label>
	<input name="email_cliente" id="email_cliente" size="30"><br><br>
   
   <label><b>Domicilio:</b></label>
   <input name="domicilio_cliente" id="domicilio_cliente" size="30"><br><br>
   
      <label><b>Telefono:</b></label>
   <input name="telefono_cliente" id="telefono_cliente" size="30"><br><br>
   <label><b>Provincia:</b></label>
	<input name="provincia" id="provincia" size="15"><br><br>
   <label><b>Ciudad:</b></label>
   <input name="ciudad_cliente" id="ciudad_cliente" size="20"><br><br>
   
   <label><b>Foto:</b></label>
   <input type="FILE" name="foto" value=""><br><br>
   
   <div align="center">
   <input type="reset" value="BORRAR" id="borrar">
  <input type="submit" value="Guardar" onClick=" ">
  <br><br>
	</div>
  </fieldset>
  <br><br>
</form>
<br><br>
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
