<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Consultas.html</title>
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<?php
include_once 'conecto.php';
$nombreyapellido=$_REQUEST['nombreyapellido'];
$telefono=$_REQUEST['telefono'];
$email=$_REQUEST['email'];
$provincia=$_REQUEST['provincia'];
$consulta=$_REQUEST['consulta'];
//valido que los campos nombres, apellidos, correo y observaciones no esten vacios.
//empty __ Determina si una variable está vacia o no
// La || es el operador logico or
if(empty($nombreyapellido) || empty($telefono) || empty($email) || empty($provincia)|| empty($consulta))
{
echo"<div align='center'>";
echo "<h3>Retorne y complete todos los campos</h3>\n";
print "<div align='center'>";
print "<a href='Consultas.html'>Volver al menu anterior</a></div>";
die ("Regrese a completar los datos!! ");
}
// Valido que el correo especificado este correcto
//strstr -encuentra la primera aparición de una cadena
//Verifico que no este blanco luego que en la cadena este el simbolo de arroba
// finalmente valido que dentro de la cadena se coloco el caracter especial punto(.)
if(!$email == "" && (!strstr($email,"@") || !strstr($email,".")))
{
echo "<h2>Retorne - Especifique un email valido</h2>\n";
print "<div align='center'>";
print "<a href='Consultas.html'>Volver al menu anterior</a></div>";
$mensaje = "<h2>Sus datos no fueron enviados</h2>\n";
echo $mensaje;
//La función die muestra el mensaje y se sale del script
die ("Regrese y complete sus datos! ! ");
}

if (is_array($_REQUEST['provincia'])) {
      foreach($_REQUEST['provincia'] as $provincia)
{ 
      if (($provincia == "Cahaco") or ($provincia == "Cordoba") or ($provincia == "Corrientes" )or ($provincia == "Formosa" )or ($provincia == "Misiones" )or ($provincia == "Santa Fe" ))
      {
            echo " "; 
      }
     else
    {
   print "<div align='cenetr'>";
   print "<a href='Consultas.html'>Volver al menu anterior</a></div>";
    die ("Regrese y complete la provincia...!! ");
    
    
}}}
else
{
	$result="INSERT INTO consultas VALUES ('','$nombreyapellido','$telefono','$email','$provincia','$consulta')";
	$insertar=mysqli_query($conn,$result);
if (!$insertar){ echo "Error al guardar:<br>( ERRNO: ".mysqli_errno($conn)." )<br>ERROR: ".mysqli_error($conn); }
else{	
echo "<script>alert('Consulta enviada')</script>";
	echo "<script>location.href='Consultas.html'</script>";}
	 mysqli_close($conn);
}
?>



<div id="pie">
	<div class="copyright">El uso de este sitio web implica la aceptaci&oacute;n de las 
        <a href="Politicas.html">Pol&iacute;ticas de Privacidad</a> de MV Travel<br>
 		 Copyright &copy; 2016 MV Travel
 	</div> <!-- Fin .copyright -->
 	<br>
 	</div>
<div id="validaciones">
<br>
	<p>
   		 <a href="http://validator.w3.org/check?uri=referer"><img
       	 	src="http://www.w3.org/Icons/valid-html401" alt="Valid HTML 4.01 Transitional" height="35" width="92"></a>
  	</p>
  	<p>
	<a href="http://jigsaw.w3.org/css-validator/check/referer">
    <img 
        src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
        alt="¡CSS Válido!" height="35" width="92" />
    </a>
	</p>

</div>
</body>
</html>