
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Consulta Administrador</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
<div id="contenedor">
<div id="encabezado">
<p align="right" >
<a href=cerrar_sesion.php><img src="imagen/cerrar.png" border="0%" width="22%"  height="8%"   hspace="20%" alt="logo" align="right"> </a></p>
<a href="menu.php"><img src="imagen/volver.jpg" width="5%" style="border: 2px solid orange" alt="ant"></a>
<h1>-Listado de Consultas-</h1>
</div>
<div id="principal">
<br>
<br>
<?php 
include_once 'conecto.php';
	$sql="SELECT * FROM consultas";
	$resul = mysqli_query($conn,$sql);
	
	
	while ($f = mysqli_fetch_array($resul))	
	{
	?>

			<table id="tabla_consultas"  width="940" style="margin-left:5px">
			<tr>
			<th width="75">Nombre</th>
			<th width="50">Telefono</th>
			<th width="75">Email</th>
			<th width="75">Provincia</th>
			<th width="150">Consulta</th>
			<th></th>
			</tr>
			<tr>
			<td width="75"><?php echo $f['nombreyapellido']?></td>
			<td width="50"><?php echo $f['telefono']?></td>
			<td width="75"><?php echo $f['email']?></td>
			<td width="75"><?php echo $f['provincia']?></td>
			<td width="150"><?php echo $f['consulta']?></td>
			<td width="75"><a href="eliminar-consulta.php?id_consulta=<?php echo $f['id_consulta']; ?>">
			 <img src='imagen/delete.png' style="border: 2px solid black" alt='eliminar'></a></td>
			</tr>
			</table>
		
	<?php 
	}
	
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