<?php
session_set_cookie_params(0,"/");
include_once 'conecto.php';
$hoy = date("Y-m-d");
session_start();

ERROR_REPORTING(E_ALL ^ E_NOTICE ^ E_WARNING);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Borrar Productos</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
<div id="contenedor">
<div id="encabezado">
<a href=cerrar_sesion.php><img src="imagen/cerrar.png" border="0%" width="22%"  height="8%"   hspace="20%" alt="logo" align="right"> </a>
<a href="menu.php"><img src="imagen/volver.jpg" width="5%" style="border: 2px solid orange" alt="ant"></a>

<h1>Borrar-producto</h1>
</div>
<div id="principal">
<?php
include_once 'conecto.php';
 echo "<a href='menu.php'>volver</a>";
$comienzo=$_GET['comienzo'];
$num = 3; // número de filas por página
if (!isset($comienzo))
  $comienzo = 0;
     // Calcular el número total de filas de la tabla
      $instruccion = "select * from producto";
      $consulta = mysqli_query ($conn,$instruccion)
         or die ("Fallo en la consulta");
      //mysql_num_rows(devuelve el numero de filas afectadas)   
      $nfilas = mysqli_num_rows ($consulta);
      if ($nfilas > 0)
      {
       // cantidad de filas a mostrar en una pag.
         print ("<TABLE WIDTH='650'>\n");
         print ("<TR><TD CLASS='blanco' ALIGN='LEFT'>");
         print ("Muestra alumnos desde " . ($comienzo + 1) . " a ");
         if (($comienzo + $num) < $nfilas)
            print ($comienzo + $num);
         else
            print ($nfilas);
         print (" de un total de $nfilas\n");
         print ("</TD>\n");

      //botones anterior y siguiente
         print ("<TD CLASS='blanco' ALIGN='RIGHT'>");
         if ($nfilas > $num)
         {
            if ($comienzo > 0)
              /*php_self permite recargar la pagina sin perder el valor de las variables.*/
             print ("[<A HREF='$PHP_SELF?comienzo=" . ($comienzo - $num) . "'>Anterior</A>| \n");
            else
               print ("[ Anterior | ");
            if ($nfilas > ($comienzo + $num))
             //  print("<a href='alumno_modificar.php?comienzo=". ($comienzo + $num) . "'>Siguiente</A> ]\n");
            print ("[<A HREF='$PHP_SELF?comienzo=" . ($comienzo + $num) . "'>Siguiente</A> ]\n");
            else
               print ("Siguiente ]\n");
         }
         print ("</TD></TR>\n");
         print ("</TABLE><BR>\n");
      }
   //prepara la consulta para mostrar con dni descendiente desde comienzo hasta num
  $instruccion = "select * from producto order by id_producto desc limit $comienzo, $num";
  $consulta = mysqli_query($conn,$instruccion)
         or die ("Fallo en la consulta");

   // Mostrar consulta
      $nfilas = mysqli_num_rows($consulta);
      if ($nfilas > 0)
      {
         print ("<TABLE WIDTH='650' table align = center border =1 >\n");
         print ("<TR>\n");
         print ("<TH WIDTH='200'>Descripcion</TH>\n");
         print ("<TH WIDTH='100'>Producto</TH>\n");
         print ("<TH WIDTH='100'>Imagen</TH>\n");
         print ("<TH WIDTH='55'>ESTADO</TH>\n");
         print ("<TH WIDTH='55'>ACCION</TH>\n");
         print ("<TH WIDTH='55'>BAJA LOGICA</TH>\n");
		 //print ("<TH WIDTH='75'>&nbsp;</TH>\n");
         print ("</TR>\n");

         for ($i=0; $i<$nfilas; $i++)
         {
            $resultado = mysqli_fetch_array($consulta);
            print ("<TR>\n");
			$prueba=$resultado['id_producto'];
			$estado=$resultado['estado'];
			print ("<td>". $resultado['descripcion']. "</td>\n");
            print ("<TD>". $resultado['nombre'] . "</TD>\n");
         
            if ($resultado['foto'] != "")
			{$nombre="imagenes/".$resultado['foto'];
               print ("<TD><IMG BORDER='0' SRC= $nombre width=100 height=120></A></TD>\n");
               print ("<TD>". $resultado['estado'] . "</TD>\n");
            }
			else
               print ("<TD>&nbsp;</TD>\n");
		 print ("<TD>" ."<a href=borrar_alumno.php?dni=".$prueba.">ELIMINAR</a>". "</TD>\n");   
		 print ("<TD>" ."<a href=baja_logica.php?id_producto=".$prueba."&.estado=".$estado.">Baja-logica</a>". "</TD>\n");
            print ("</TR>\n");
         }
       
         print ("</TABLE>\n");
      }
      else
         print ("no hay productos disponibles");

// Cerrar conexión
   mysqli_close ($conn);

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