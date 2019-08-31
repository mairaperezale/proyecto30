<?php 
include_once 'conecto.php';
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Agregar Producto</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
<div id="contenedor">
<div id="encabezado">
<a href=cerrar_sesion.php><img src="imagen/cerrar.png" border="0%" width="22%"  height="8%"   hspace="20%" alt="logo" align="right"> </a>
<a href="menu.php"><img src="imagen/volver.jpg" width="5%" style="border: 2px solid orange" alt="ant"></a>

<h1>Alta Producto</h1>
</div>
<div id="principal">
<br>
<br>
<form method="post"  action="guardar_producto.php" ENCTYPE="multipart/form-data">
<br><br>
<fieldset >
	<legend> Datos producto</legend>
	<label><b>Nombre:</b></label>
	<input name="nombre" id="nombre" size="30"><br><br>
	
	<label><b>Precio:</b></label>
	<input name="precio" id="precio" size="20"><br><br>
	   
    <label><b>Codigo de Producto:</b></label>
	<input name="codigo_producto" id="codigo_producto" id="25"><br><br>
   
   <label><b>Cantidad:</b></label>
	<input name="cantidad" id="cantidad" id="25"><br><br>
   
   <label><b>Descripcion:</b></label>
   <input name="descripcion" id="descripcion" size="30"><br><br>
   
   <label><b>Foto:</b></label>
   <input type="FILE" name="foto" value=""><br><br>
   
   <div align="center">
   <br><br>
   <input type="reset" value="BORRAR" id=borrar">
   <input type="submit" value="Guardar" onClick=" ">
   <br><br>
	</div>
  </fieldset>
  
 <?php 
//preparo laconsulta sql
  $query ="SELECT * FROM producto"; 
  $sql= mysqli_query($conn,$query)or die ("fallo en la consulta"); 
  //$sql funcion que maneja el resultado de las tablas
//recupero una fila de resultados como un array asociativo, un array numerico o como ambos 
//el tipo de array a ser devuelto depende de la constante (MYSQL_BOTH, NUM O ASSOC)
//MYSQL_BOTH recupera un array con ambos indices asociativos y numericos
  $usuario = mysqli_fetch_array($sql,MYSQLI_BOTH);
  $row=mysqli_fetch_row($sql);//selecciona una fila para mostrar 
  ?>
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