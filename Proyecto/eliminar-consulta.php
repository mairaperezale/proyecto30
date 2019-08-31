<?php 
require_once 'conecto.php';
$id=$_GET['id_consulta'];
    if (!$conn)
    return "No se puede conectar al servidor de la base de datos - por favor inténtalo más tarde.";
	$res="DELETE FROM consultas where id_consulta = '$id'" ;
    $sql = mysqli_query($conn,$res); 
	   
    if(!$sql)
	 echo "No se puede conectar al servidor de la base de datos ";
    else {

	echo "<script>window.alert('Consulta borrada con exito!')</script>";
    echo ("<script>window.location='consultas-admi.php'</script>");

	} mysqli_close($conn);
?>