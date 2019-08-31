<?php
session_set_cookie_params(0,"/");
include_once 'conecto.php';
$hoy = date("Y-m-d");
session_start();

/* 
 * iniciar sesion si se necesitan utilizar 
 * las variables de sesion 
 */
ERROR_REPORTING(E_ALL ^ E_NOTICE ^ E_WARNING);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Enviar</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
<div id="contenedor">
<div id="encabezado">
<p align="right" >
<a href=cerrar_sesion.php><img src="imagen/cerrar.png" border="0%" width="22%"  height="8%"   hspace="20%" alt="logo" align="right"> </a></p>
<a href="menu.php"><img src="imagen/volver.jpg" width="5%" style="border: 2px solid orange" alt="ant"></a>
<h1>Factura</h1>
</div>
<div id="principal">
<?php
    
   	if ($_SESSION['usuario_rol']== 'admin'){
   	 echo "<a href=mostrar_poducto.php><img src='imagenes/botones/administracion.jpg'> </a>";	
   	}
  // else{echo"<a href=carrito-de-compra.php><img src='imagenes/carrito-de-compras-.jpg' width=50 height=50> </a>";
   //}
   	    

//RECIBO LOS CAMPOS DEL FORMULARIO

	if ($_SESSION['auth']== true && isset($_SESSION['auth']))
   		{
   			$usuario=$_SESSION['usuario_nombre'];
   		}   
   	$sql= "SELECT * FROM usuario WHERE usuario_nombre LIKE '%$usuario%'";    
	$consulta = mysqli_query($conn,$sql );
	$resul = mysqli_fetch_array($consulta);
	$email=$resul['email'];
	$nombre = $resul['id_usuario'];
	$domicilio =$_POST['domicilio'];
	$provincia =$_POST['provincia'];
	$nomTarjeta =$_POST['nomTarjeta'];
	$tarjeta =$_POST['tarjeta'];
	$numTarjeta =$_POST['numtarjeta'];
	$mes =$_POST['mes'];
	$anio =$_POST['anio'];
	$vencimiento = $mes.'/'.$anio;
	$total =$_POST['precio'];
	if (empty($nombre) || empty($domicilio)|| empty($nomTarjeta) || empty($tarjeta)||
		empty($numTarjeta) || empty($mes) || empty($anio) || empty($total))
	{
			echo ('<br><br><h1>Complete todos los campos</h1>');
	     	echo "<p align='center'><a href='orden.php?clave=" .$importe_total."'> ACEPTAR </a></p>";
	}
	else
	{
	$result="INSERT INTO pedido VALUES ('','$nombre','$domicilio','$provincia','$nomTarjeta','$tarjeta','$numTarjeta','$vencimiento','$total')";
	$insertar=mysqli_query($conn,$result);

				
		$sql="SELECT MAX(id_pedido) AS id_pedido FROM pedido";
		$buscarPro = mysqli_query($conn,$sql);
		$idVenta = mysqli_fetch_array($buscarPro) or die(mysqli_error()); 
		$idPedido= $idVenta['id_pedido'];
		
		foreach ($_SESSION['carrito'] as $clave => $valor)
				{
					$idProducto = $valor['id_producto'];
					$nombreP= $valor['nombre'];
	            	$precio = $valor['precio'];
					$cantidaPro = $valor['cantidad'];
					$imagen = $valor['nombreFichero'];
					$nombre = $resul['id_usuario'];					
					$Sql1="insert into detalle values('$nombre','$idPedido','$idProducto','$cantidaPro','$nombreP','$imagen')" ;
					$resDetalle2= mysqli_query($conn,$Sql1);
			 	
				}

				echo "<center>";
				echo "<form>";
				echo "<table id='tabla_encabezado' width='900' style='margin-left:20px'>";
				$fecha = date ("Y-m-d"); // Fecha actual
				
				echo "<tr>";
				echo "<td><br>Producto</td>";
				echo "<td><br>Cantidad</td>";
				echo "<td><br>Precio</td><br>";
				
				echo "</tr>";

			   		
			foreach ($_SESSION['carrito'] as $clave => $valor)
			{
				
				$buscar = $valor['id_producto'];
				$res="SELECT * FROM producto WHERE id_producto=$buscar";
				$sql=mysqli_query($conn,$res) or die (mysqli_error());
				
				$mifila =mysqli_fetch_array($sql);
				$nombreP=$mifila['nombre'];
				$precio=$mifila['precio'];
				$cantidadPro = $valor['cantidad'];
				$precioxP=$cantidadPro * $precio;

				echo "<tr>";
				echo "<td></td>";
				echo "</tr>";
				echo"<tr>";
				echo "<td WIDTH=410>".$nombreP."</td>";
				echo  "<td WIDTH=540>".$cantidadPro."</td>";   
			    echo "<td WIDTH=150>$ ".$precioxP." </td>";
				
			    echo "<tr><td colspan='5'><hr></td></tr>";
				
				echo"</tr>";
				
			}	
				
				echo "<center>"; 
				
				echo "<tr>";
				echo "<td style='margin-left:20px'><br>Total Compra : $ ".$total."</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td><br></td>";
				echo "</tr>";
				echo "<tr>";

				echo "</tr>";
				echo "<tr>";
				echo "<td><br></td>";
				echo "</tr>";
				echo "<script type='text/javascript'>
						alert('Su Pedido Ha Sido Procesado con Éxito. Imprima la siguiente factura para tener su comprobante de solicitud. Muchas Gracias ');
						</script>";
				?>
				<div id="compro">
				<p>Gracias por su compra: <?php echo " ".$usuario?></p>	
				
			
				<p>Se enviará un e-mail de confirmación a su dirección de correo: <?php echo " ". $email?></p>
				<div id="nombre_empresa">
				</div>
				<p>Fecha:<?php echo " ".$fecha?></p>
				</div>
				<?php 
				echo"<td><input id='imprimir' type='button' onclick='window.print();' value=' Imprimir Factura '></td>";
				echo"<td><img src='imagen/codigo.gif'style='margin-left:90px' width='40%'  height='20%'   alt='logo' align='right'></td>";
				echo"</tr>";
		      	echo"</table>";
				echo"</center>";
				echo"</form>";
				//echo "<script type='text/javascript'>alert('guardado con exito');

				//window.location='menu.php';</script>"; header("location:menu.php");  
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