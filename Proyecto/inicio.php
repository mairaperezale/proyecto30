<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Iniciar Sesion</title>
<link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
<div id="contenedor">
<div id="encabezado">
<a href="Parte1.html"><img src="imagen/volver.jpg" width="5%" style="border: 2px solid orange" alt="ant"></a>
<h1>Iniciar Sesion</h1>
</div>
<div id="principal">

<form name="login" id="login" action="autentificar.php" method="post">
<br><br>
<fieldset> 

<legend>DATOS</LEGEND>
<label>* Usuario: &nbsp; &nbsp;</label>
<input type="text" name="usuario" id="usuario" value="" size= "20"><br><BR>
<label>* Password: &nbsp;</label>
<input type="password" name="passw" id="passw" value="" size="20"><br><br>
<input type="submit" name="enviar" id="enviar" value="Iniciar Sesion">

</fieldset>
</form>
<?php 
echo "<a href=registrarse.php><img src='imagen/registrate.png' width='22%'  border='0%' height='8%'   hspace='20%' vspace='30%' style='margin-left:50%' alt='logo'></a>";
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
