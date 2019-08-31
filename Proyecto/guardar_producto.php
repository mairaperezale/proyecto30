<?php
ERROR_REPORTING(E_ALL ^ E_NOTICE ^ E_WARNING);
include_once 'conecto.php';
//RECIBO LOS CAMPOS DEL FORMULARIO
$nombre = $_POST['nombre'];
$precio= $_POST['precio'];
$codigo = $_POST['codigo_producto'];
$cantidad= $_POST['cantidad'];
$descripcion = $_POST['descripcion'];
$foto=$_POST['nombreFichero']; 
$nombreDirectorio = "IMG/";
$nombreFichero= $codigo.".jpg"; 
move_uploaded_file($_FILES['foto']['tmp_name'],$nombreDirectorio.$nombreFichero);
// para el caso del que tiene solo el id como clave colocar en lugar del dni el id, pero iria un blanco asi(' ', y ahi todos los demas campos como esta aca abajo)
if (empty($nombre) || empty($precio)|| empty($codigo)|| empty($cantidad)|| empty($descripcion))
{
echo '<script languaje = javascript>
            alert("Datos en blanco.. Rellene todos los campos")
            self.location="agregar_producto.php"
            </script>';
}
else{
$result="INSERT INTO producto VALUES (' ','$nombre','$cantidad','$precio','$nombreFichero','$codigo','$descripcion')";
$insertar=mysqli_query($conn,$result);
if (!$insertar){ echo "Error al guardar:<br>( ERRNO: ".mysqli_errno($conn)." )<br>ERROR: ".mysqli_error($conn); }
else{ echo "<script type='text/javascript'>alert('guardado con exito');
						window.location='agregar_producto.php';</script>"; header("location:agregar_producto.php");  }

	 mysqli_close($conn);
}  
?>
