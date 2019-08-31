<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Registrar</title>
<link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
<div id="contenedor">
<div id="encabezado">
</div>
<div id="principal">

<?php
include_once 'conecto.php';
//RECIBO LOS CAMPOS DEL FORMULARIO
$usuario = $_POST['usuario'];
$password= $_POST['password'];
$rol='visita';
$nombre = $_POST['usuario'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$domicilio = $_POST['domicilio'];
$telefono = $_POST['telefono'];
$provincia = $_POST['provincia'];
$dni=$_POST['dni'];
$foto=$_POST['foto']; 
$nombreDirectorio = "IMG/";
$nombreFichero = $dni.".jpg";
move_uploaded_file($_FILES['foto']['tmp_name'],$nombreDirectorio.$nombreFichero);
// para el caso del que tiene solo el id como clave colocar en lugar del dni el id, pero iria un blanco asi(' ', y ahi todos los demas campos como esta aca abajo)
if (empty($usuario) || empty($password))
{
echo '<script languaje = javascript>
            alert("Datos en blanco.. rellene todos los campos")
            self.location="registrarse.php"
            </script>';
}
else{
$result="INSERT INTO usuario VALUES (' ','$usuario','$password','$rol','$nombre','$apellido','$dni','$domicilio','$email','$telefono','$nombreFichero','$provincia')";
$insertar=mysqli_query($conn,$result);
if (!$insertar){ echo "Error al guardar:<br>( ERRNO: ".mysqli_errno($conn)." )<br>ERROR: ".mysqli_error($conn); }
else{ echo "<script type='text/javascript'>alert('guardado con exito');
						window.location='inicio.php';</script>"; header("location:inicio.php");  }

	 mysqli_close($conn);
}
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
