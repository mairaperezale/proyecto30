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
<title>Mostrar Clientes</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
<div id="contenedor">
<div id="encabezado">
<p align="right" >
<a href=cerrar_sesion.php><img src="imagen/cerrar.png" border="0%" width="22%"  height="8%"   hspace="20%" alt="logo" align="right"> </a></p>
<a href="menu.php"><img src="imagen/volver.jpg" width="5%" style="border: 2px solid orange" alt="ant"></a>
<h1>Listado de Clientes</h1>
</div>
<div id="principal">
<br>
<br>
   <?php 
 //echo "<p class='mi-clase'>"."<a href='menu.php'>&lt;Volver&gt;</a>"."</p>";
 $query ="SELECT  * FROM cliente";
$result = mysqli_query($conn,$query);

While ($row = mysqli_fetch_array($result)){
   		$dni=$row['dni'];
         $nombre=$row['nombre'] ;
          $apellido=$row['apellido'];
           $domicilio=$row['domicilio'];
           $email=$row['email'];
           $telefono=$row['telefono'];
           $provincia=$row['provincia'];
           $ciudad=$row['ciudad'];
	  	 $foto="IMG/".$row['nombreFichero'] ;
		
         
  echo "<fieldset style='background-color: #ffffff;'> <br></br>";
  echo "<p> <img align='right' src='".$foto."' width=150 height=100/>";
  echo '<b>Nombre:</b> &nbsp;'.$nombre.'<br><br>';
   echo '<b>apellido:</b> &nbsp;'.$apellido.'<br><br>';
    echo '<b>DNI:</b> &nbsp;'.$dni.'<br><br>';
  echo '<b>Domicilio:</b> &nbsp;'.$domicilio.'<br><br>';
   echo '<b>E-mail:</b> &nbsp;'.$email.'<br><br>';
    echo '<b>Telefono:</b> &nbsp;'.$telefono.'<br><br>';
     echo '<b>Provincia:</b> &nbsp;'.$provincia.'<br><br>';
      echo '<b>Ciudad:</b> &nbsp;'.$ciudad.'<br><br>';
 
  echo "</fieldset>";
      }
              mysqli_close($conn);
     ?>
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
