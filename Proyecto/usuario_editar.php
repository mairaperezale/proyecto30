<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Editar Cliente</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
<div id="contenedor">
<div id="encabezado">
<a href=cerrar_sesion.php><img src="imagen/cerrar.png" border="0%" width="22%"  height="8%"   hspace="20%" alt="logo" align="right"> </a>
<a href="menu.php"><img src="imagen/volver.jpg" width="5%" style="border: 2px solid orange" alt="ant"></a>

<h1>Editar Cliente</h1>
</div>
<div id="principal">
<br>
<br>

<FORM ACTION="cliente_modificado.php"  method="post" enctype="multipart/form-data" >
<?php   
$dni=$_REQUEST['dni'];
 require_once 'conecto.php';
  if (!$conn)
    return "No se puede conectar al servidor de la base de datos - por favor inténtalo más tarde.";
   $sql1 = "SELECT * FROM cliente where dni= '$dni'";
   $sql=mysqli_query($conn,$sql1); 
   $row = mysqli_fetch_array($sql);

 ?>

    <label>DNI</label>
     <input name="dni" type="text" value="<?php echo $dni?>" size="40" maxlength="15">
   
    <label>Nombre</label>
    <input name="nombre" type="text" value="<?php echo $row['nombre']?>" size="50">
   
    <label>Apellido</label>
    <input name="apellido" type="text" value="<?php echo $row['apellido']?>" size="50">

    <label>Domicilio</label>
<input name="domicilio" type="text" value="<?php echo $row['domicilio']?>" size="50">
   
   <label>Email</label>
    <input name="email" type="text" value="<?php echo $row['email']?>" size="50">
   
    <label>Telefono</label>
    <input name="telefono" type="text" value="<?php echo $row['telefono']?>" size="50">
 
    <label>Provincia</label>
    <input name="provincia" type="text" value="<?php echo $row['provincia']?>" size="50">
     
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