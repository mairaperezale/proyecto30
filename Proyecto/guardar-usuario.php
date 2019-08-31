<?php
ERROR_REPORTING(E_ALL ^ E_NOTICE ^ E_WARNING);
include_once 'conecto.php';
//RECIBO LOS CAMPOS DEL FORMULARIO
$nombre = $_POST['nombre_cliente'];
$apellido = $_POST['apellido_cliente'];
$email = $_POST['email_cliente'];
$domicilio = $_POST['domicilio_cliente'];
$telefono = $_POST['telefono_cliente'];
$provincia = $_POST['provincia'];
$ciudad = $_POST['ciudad_cliente'];
$dni=$_POST['dni_cliente'];
$foto=$_POST['foto']; 
$nombreDirectorio = "IMG/";
$nombreFichero = $dni.".jpg";
move_uploaded_file($_FILES['foto']['tmp_name'],$nombreDirectorio.$nombreFichero);
// para el caso del que tiene solo el id como clave colocar en lugar del dni el id, pero iria un blanco asi(' ', y ahi todos los demas campos como esta aca abajo)
if (empty($nombre) || empty($apellido)|| empty($domicilio)|| empty($telefono)|| empty($provincia)|| empty($ciudad))
{
echo '<script languaje = javascript>
            alert("Datos en blanco.. Rellene todos los campos")
            self.location="ingreso-usuario.php"
            </script>';
}
if(!$email == "" && (!strstr($email,"@") || !strstr($email,".")))
{
echo '<script languaje = javascript>
            alert("Datos incorrectos.. complete su email correctamente")
            self.location="ingreso-usuario.php"
            </script>';
}
else{
$result="INSERT INTO cliente VALUES (' ','$nombre','$apellido','$dni','$domicilio','$email','$telefono','$nombreFichero','$provincia','$ciudad')";
$insertar=mysqli_query($conn,$result);
if (!$insertar){ echo "Error al guardar:<br>( ERRNO: ".mysqli_errno($conn)." )<br>ERROR: ".mysqli_error($conn); }
else{ echo "<script type='text/javascript'>alert('guardado con exito');
						window.location=ingreso-usuario.php;</script>"; header("location:ingreso-usuario.php");  }

	 mysqli_close($conn);
}    
?>
