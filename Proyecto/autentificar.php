<?php 
require_once 'conecto.php';
//Trim: esta función devuelve una cadena con los espacios en blanco eliminados
// del inicio y final del str
$usuario 	= trim($_POST['usuario']);
$password	= trim($_POST['passw']);
if (empty($usuario) || empty($password))
{
	echo '<script languaje = javascript>
            alert("Datos en blanco.. Rellene ambos campos")
            self.location="inicio.php"
            </script>';
	}
else {
	$query = ("SELECT id_usuario, usuario_nombre, usuario_password, usuario_rol
			FROM usuario
			WHERE
			usuario_nombre = '$usuario' AND usuario_password = ('$password')");
	$result= mysqli_query($conn,$query) or die  ("fallo en la consulta");
	/* array numérico y asociativo */
	$row = mysqli_fetch_array($result);
	$existeuser = mysqli_num_rows($result); //devuelve numeros 0 no existe 1 si existe
	if ($row != 0 ) { 
		session_start();
	$_SESSION['auth']= true;
	$_SESSION['usuario_id'] =       $row['id_usuario'];
	$_SESSION['usuario_nombre'] =   $row['usuario_nombre'];
	$_SESSION['usuario_paswword'] = $row['usuario_password'];
	$_SESSION['usuario_rol']  =     $row['usuario_rol'];
	//echo "<script type='text/javascript'>alert('Logueado con exito');
						//window.location='bienvenida.php';</script>";
header("Location:menu.php");

	}
	else {
		echo '<script languaje = javascript>
            alert("Usuario o password Icorrecto, por favor verifique")
            self.location="inicio.php"
            </script>';
	       }
}
	
	
		?>