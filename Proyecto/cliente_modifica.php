<?php
//session_set_cookie_params(0,"/");
include_once 'conecto.php';
//$hoy = date("Y-m-d");
session_start();

ERROR_REPORTING(E_ALL ^ E_NOTICE ^ E_WARNING);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Modificar Cliente</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
<div id="contenedor">
<div id="encabezado">
<a href=cerrar_sesion.php><img src="imagen/cerrar.png" border="0%" width="22%"  height="8%"   hspace="20%" alt="logo" align="right"> </a>
<a href="menu.php"><img src="imagen/volver.jpg" width="5%" style="border: 2px solid orange" alt="ant"></a>

<h1>Modificar Cliente</h1>
</div>
<div id="principal">
<br>
<br>
<?php
//include_once 'conecto.php';
 //echo "<a href='menu.php'>volver</a>";
 
 $comienzo=$_GET['comienzo'];
 $num = 3; // número de filas por página

 if (!isset($comienzo))
 	$comienzo = 0;
    
  else 
      $comienzo=$_GET['comienzo'];
  
     // Calcular el número total de filas de la tabla
      $instruccion = "select * from cliente";
      $consulta=mysqli_query($conn,$instruccion) or die  ("fallo en la consulta");
     // $consulta = mysqli_query($instruccion,$conn)
         //or die ("Fallo en la consulta");
      //mysql_num_rows(devuelve el numero de filas afectadas)   
      $nfilas = mysqli_num_rows ($consulta);

      if ($nfilas > 0)
      {
       // cantidad de filas a mostrar en una pagina.
         print ("<TABLE WIDTH='650'align='center'>\n");
         print ("<TR><TD CLASS='blanco' ALIGN='LEFT'>");
         print ("<div style='margin-left:20px'>Muestra clientes desde " . ($comienzo + 1) . " a ");
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
                print ("[ <A style='color:blue' HREF='$PHP_SELF?comienzo=" . ($comienzo - $num) . "'>Anterior</A> |\n");
              else
                print ("[ Anterior | ");
            if ($nfilas > ($comienzo + $num))
             //  print("<a href='alumno_modificar.php?comienzo=". ($comienzo + $num) . "'>Siguiente</A> ]\n");
            print ("<A style='color:blue' HREF='$PHP_SELF?comienzo=" . ($comienzo + $num) . "'>Siguiente</A> ]\n");
            else
               print ("Siguiente ]\n");
         }
         print ("</TD></TR>\n");
         print ("</TABLE><BR>\n");
      }
   //prepara la consulta para mostrar con dni descendiente desde comienzo hasta num
  $instruccion = "select * from cliente order by dni desc limit $comienzo, $num";
  $consulta = mysqli_query($conn,$instruccion) or die  ("fallo en la consulta");
           // Mostrar consulta
      $nfilas = mysqli_num_rows($consulta);
      if ($nfilas > 0)
      {
         print ("<TABLE id='tabla_consultas' style='margin-left:30px' WIDTH='900'align = 'center' border ='2px' >\n");
         print ("<TR>\n");
         print ("<TH WIDTH='100'>DNI</TH>\n");
         print ("<TH WIDTH='100'>Nombre</TH>\n");
         print ("<TH WIDTH='75'>Apellido</TH>\n");
         print ("<TH WIDTH='200'>Domicilio</TH>\n");
          print ("<TH WIDTH='75'>Email</TH>\n");
         print ("<TH WIDTH='75'>Telefono</TH>\n");
         print ("<TH WIDTH='75'>Provincia</TH>\n");
         print ("<TH WIDTH='130'>Imagen</TH>\n");
		 print ("<TH WIDTH='75'>&nbsp;</TH>\n"."");
         print ("</TR>\n");

         for ($i=0; $i<$nfilas; $i++)
         {
            $resultado = mysqli_fetch_array($consulta);
            print ("<TR>\n");
			$prueba=$resultado['dni'];
			print ("<td>". $resultado['dni']. "</td>\n");
            print ("<TD>". $resultado['nombre'] . "</TD>\n");
             print ("<TD>". $resultado['apellido'] . "</TD>\n");
             print ("<TD>". $resultado['domicilio'] . "</TD>\n");
             print ("<TD>". $resultado['email'] . "</TD>\n");
              print ("<TD>". $resultado['telefono'] . "</TD>\n");
               print ("<TD>". $resultado['provincia'] . "</TD>\n");
           if ($resultado['nombreFichero'] != "")
			{$nombre="IMG/".$resultado['nombreFichero'] ;
               print ("<TD><IMG BORDER='0' SRC= $nombre width=100 height=120></A></TD>\n");
            }
			else
         print ("<TD>&nbsp;</TD>\n");
		 print ("<TD>" ."<a href=usuario_editar.php?dni=".$prueba."> <img src='imagen/modificar.png' border='0%' width='80px' alt='editar'> </a>". "</TD>\n");   

         print ("</TR>\n");
         }
       
         print ("</TABLE>\n");
      }
      else
         print ("No hay clientes disponibles");
// Cerrar conexión
   mysqli_close ($conn);
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