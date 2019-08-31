<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Producto Editar</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
<div id="contenedor">
<div id="encabezado">
<a href=cerrar_sesion.php><img src="imagen/cerrar.png" border="0%" width="22%"  height="8%"   hspace="20%" alt="logo" align="right"> </a>
<a href="menu.php"><img src="imagen/volver.jpg" width="5%" style="border: 2px solid orange" alt="ant"></a>

<h1>Editar Producto</h1>
</div>
<div id="principal">
<br>
<br>

<FORM ACTION="producto_modificado.php"  method="post" enctype="multipart/form-data" >
<?php   
//ERROR_REPORTING(E_ALL ^ E_NOTICE ^ E_WARNING);
$codigo=$_REQUEST['codigo_producto'];
 require_once 'conecto.php';
  if (!$conn)
    return "No se puede conectar al servidor de la base de datos - por favor inténtalo más tarde.";
   $sql1 = "SELECT * FROM producto where codigo_producto= '$codigo'";
   $sql=mysqli_query($conn,$sql1); 
   $row = mysqli_fetch_array($sql);

 ?>

    <label>Codigo</label>
     <input name="codigo_producto" type="text" value="<?php echo $codigo?>" size="40" maxlength="15">
   
    <label>Nombre</label>
    <input name="nombre" type="text" value="<?php echo $row['nombre']?>" size="50">
   
    <label>Precio</label>
    <input name="precio" type="text" value="<?php echo $row['precio']?>" size="50">

    <label>Cantidad</label>
<input name="cantidad" type="text" value="<?php echo $row['cantidad']?>" size="50">
   
   <label>Descripcion</label>
    <input name="descripcion" type="text" value="<?php echo $row['descripcion']?>" size="50">
     
     <label>IMAGEN</label>
    <input type="file" name="foto">
    
    <div align="center">
      <input type="submit" name="Submit" value="GRABAR">
    </div>
</FORM>
<br>
<br>
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