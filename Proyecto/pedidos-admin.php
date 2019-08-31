<?php 
include_once 'conecto.php';
ERROR_REPORTING(E_ALL ^ E_NOTICE ^ E_WARNING);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>pedidos</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
<div id="contenedor">
<div id="encabezado">
<a href=cerrar_sesion.php><img src="imagen/cerrar.png" border="0%" width="22%"  height="8%"   hspace="20%" alt="logo" align="right"> </a>
<a href="menu.php"><img src="imagen/volver.jpg" width="5%" style="border: 2px solid orange" alt="ant"></a>

<h1>Listado de Pedidos</h1>
</div>
<div id="principal">
<?php 
	if (!$_GET)
	{
		$comienzo=0;
	}
	else
	{
		$comienzo=$_GET['comienzo'];
	}
	$num = 4; // número de filas por página
	if (!isset($comienzo))
	  $comienzo = 0;
	     // Calcular el número total de filas de la tabla
	      $instruccion = "select * from pedido";
	      $consulta = mysqli_query ($conn,$instruccion) or die ("Fallo en la consulta");
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
            if ($nfilas > ($comienzo + $num)){
             //  print("<a href='alumno_modificar.php?comienzo=". ($comienzo + $num) . "'>Siguiente</A> ]\n");
            print ("[ <A style='color:blue' HREF='$PHP_SELF?comienzo=" . ($comienzo + $num) . "'>Siguiente</A> ]\n");
            }
            else
               print ("Siguiente ]\n");
         }
         print ("</TD></TR>\n");
         print ("</TABLE><BR>\n");
      
	 ?>
	         <table id="tabla_consultas" style='margin-left:30px' width="900">
	 <?php
	      }
	   //prepara la consulta para mostrar con id_pedido ascendente desde comienzo hasta num en orden de llegada
	  $instruccion = "select * from pedido order by id_pedido asc limit $comienzo, $num";
	  $consulta = mysqli_query($conn,$instruccion)
	         or die ("Fallo en la consulta");
	
	   // Mostrar consulta
	   $nfilas = mysqli_num_rows($consulta);
	      if ($nfilas > 0)
	      {
	         
	   ?>
	      	<tr>
			<th width="75">Id Usuario</th>
			<th width="80">Provincia</th>
			<th width="90">Dirección</th>
			<th width="75">Tarjeta</th>
			<th width="75">Nombre en tarjeta</th>
			<th width="75">Numero de tarjeta</th>
			<th width="75">Vencimiento de tarjeta</th>
			<th width="75">Total a pagar</th>
			<th width="75">Borrar pedido</th>
			</tr>
	  <?php 
	
	         for ($i=0; $i<$nfilas; $i++)
	         {
	            while ($f = mysqli_fetch_array($consulta))
				{
	  ?>				
			           	<tr>
						<td width="75"><?php echo $f['id_usuario']?></td>
						<td width="80"><?php echo $f['provincia']?></td>
						<td width="90"><?php echo $f['direccion']?></td>
						<td width="75"><?php echo $f['tarjeta']?></td>
						<td width="75"><?php echo $f['nombre_tarjeta']?></td>
						<td width="75"><?php echo $f['numero_tarjeta']?></td>
						<td width="75"><?php echo $f['vecimiento']?></td>
						<td width="75">$<?php echo $f['total']?></td>
	        			<td><a href="eliminar-pedido.php?id_pedido=<?php echo $f['id_pedido']; ?>">
			 <img src='imagen/delete.png' style="border: 2px solid black" alt='eliminar'></a></td>
						
						</tr>
	  <?php 
				}
	         }
	  ?>
	       
	         </table>
	   
	   <?php     
	      }
	      else
	      {
	         print ("No hay usuarios disponibles");
	      }
	
	// Cerrar conexión
	   mysqli_close ($conn);
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