<?php
session_start();
ERROR_REPORTING(E_ALL ^ E_NOTICE ^ E_WARNING);
include_once 'conecto.php';

    $dni=$_POST['dni'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $domicilio=$_POST['domicilio'];
    $email=$_POST['email'];
    $telefono=$_POST['telefono'];
   $foto=$_POST['nombreFichero'];
   $nombreDirectorio = "IMG/";
   $nombreFichero = $dni.".jpg";
    $provincia=$_POST['provincia'];
    //$ciudad=$_POST['ciudad'];
    $result2="UPDATE cliente SET dni='$dni', nombre='$nombre',apellido='$apellido',domicilio='$domicilio',email='$email',telefono='$telefono',nombreFichero='$foto',provincia='$provincia' WHERE dni='$dni'";
   $result = mysqli_query($conn,$result2);
   ?>
   
   <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
   <html>
   <head>
   <title>Alumno Modificado</title>
   <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
 <link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
<div id="contenedor">
<div id="encabezado">
<a href=cerrar_sesion.php><img src="imagen/cerrar.png" border="0%" width="22%"  height="8%"   hspace="20%" alt="logo" align="right"> </a>
<a href="menu.php"><img src="imagen/volver.jpg" width="5%" style="border: 2px solid orange" alt="ant"></a>

<h1>Cliente Modificado</h1>
</div>
<div id="principal">
<br>
<br>

   <FORM ACTION="" method="POST">
 <?php 
if (!$result){
	return "NO HA PODIDO MODIFICAR el cliente - por favor inténtalo más tarde.";
 }
 else{
 if (is_uploaded_file($_FILES['foto']['tmp_name'])){
       $nombreFichero = $dni.".jpg";
 	   $nombreDirectorio= "IMG/";
 	    	   
 	 //la funcion unlink permite borrar el archivo 
    unlink ($nombreDirectorio.$nombreFichero);
	 move_uploaded_file($_FILES['foto']['tmp_name'],$nombreDirectorio.$nombreFichero);
	  //almaceno la ruta
	 	 	 $ruta = $nombreDirectorio.$nombreFichero;
	 	$result3="UPDATE cliente SET nombreFichero = '$nombreFichero' WHERE dni = '$dni'"; 	
	     $result = mysqli_query($conn,$result3);
		 
	}
	else{
		return "La imagen no se ha podido cargar";
		}
 }
	
  //echo ($dni);
  	echo "Cliente modificado con exito";
    echo "<script>window.alert('Cliente modificado con exito!')</script>";
    echo ("<script>window.location='cliente_modifica.php?'</script>");
   //header("location:cliente_modifica.php");
 ?></FORM>
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