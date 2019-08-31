<?php
//session_set_cookie_params(0,"/");
include_once 'conecto.php';
//$hoy = date("Y-m-d");
session_start();

ERROR_REPORTING(E_ALL ^ E_NOTICE ^ E_WARNING);
// Notificar todos los errores excepto E_NOTICE y E_WARNING
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Mostrar Producto</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
<div id="contenedor">
<div id="encabezado">
<p align="right" >
<a href=cerrar_sesion.php><img src="imagen/cerrar.png" border="0%" width="22%"  height="8%"   hspace="20%" alt="logo" align="right"> </a></p>
<a href="menu.php"><img src="imagen/volver.jpg" width="5%" style="border: 2px solid orange" alt="ant"></a>
<h1>Catalogo de Destinos</h1>
</div>
<div id="principal">
<br>
<br>
   <?php 
 //echo "<p class='mi-clase'>"."<a href='menu.php'>&lt;Volver&gt;</a>"."</p>";
 $query ="SELECT  * FROM producto";
$result = mysqli_query($conn,$query);

While ($row = mysqli_fetch_array($result)){
   		$codigo=$row['codigo_producto'];
         $nombre=$row['nombre'] ;
          $precio=$row['precio'];
           $descripcion=$row['descripcion'];
	  	 $foto="IMG/".$row['nombreFichero'] ;
		
         
  echo "<fieldset style='background-color: #ffffff;'> <br></br>";
  echo "<p> <img align='right' src='".$foto."' width=150 height=100/>";
  echo '<b>Nombre:</b> &nbsp;'.$nombre.'<br><br>';
   echo '<b>Precio:</b> &nbsp;'.$precio.'<br><br>';
    echo '<b>Codigo:</b> &nbsp;'.$codigo.'<br><br>';
  echo '<b>Descripcion:</b> &nbsp;'.$descripcion.'<br><br>';
 
  echo "</fieldset>";
      }
              mysqli_close($conn);
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