<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Autentificación Simple</title>
<link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
<div id="contenedor">
<div id="encabezado">
<a href="inicio.php"><img src="imagen/volver.jpg" width="5%" style="border: 2px solid orange" alt="ant"></a>
<h1> Registrate</h1>

</div>
<div id="principal">
		
	<form action="reg.php" method="post">
		<fieldset >
	<legend> Registrate</legend>
	
	<label><b>Nombre:</b></label>
	<input type="text" name="usuario" id="campo_texto">

	<label><b>Contrase&ntilde;a:</b></label>
				<input type="password" name="password" id="campo_texto">

	<label><b>Dni:</b></label>
   <input name="dni" id="dni" size="30"><br><br>
	
	<label><b>Apellido:</b></label>
	<input name="apellido" id="apellido" size="30"><br><br>
	   
    <label><b>E-mail:</b></label>
	<input name="email" id="email" size="30"><br><br>
   
   <label><b>Domicilio:</b></label>
   <input name="domicilio" id="domicilio" size="30"><br><br>
   
      <label><b>Telefono:</b></label>
   <input name="telefono" id="telefono" size="30"><br><br>
   <label><b>Provincia:</b></label>
	<input name="provincia" id="provincia" size="15"><br><br>
   
   <label><b>Foto:</b></label>
   <input type="FILE" name="foto" value=""><br><br>
		
	<div align="left">
   <br><br>
  	<input type="reset" value="BORRAR" id="enviar">
	<input type="submit" value="GUARDAR" id="enviar">
   <br><br>
	</div>
		</fieldset>	
	</form>
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