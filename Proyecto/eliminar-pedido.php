<?php 
require_once 'conecto.php';
$id=$_GET['id_pedido'];
    if (!$conn)
    return "No se puede conectar al servidor de la base de datos - por favor inténtalo más tarde.";
    $res="DELETE FROM pedido where id_pedido = '$id'" ;
    $sql = mysqli_query($conn,$res); 
	   
    if(!$sql)
	 echo "No se puede conectar al servidor de la base de datos ";
    else {

		echo "<script>window.alert('Pedido borrado con exito!')</script>";
	    echo ("<script>window.location='pedidos-admin.php'</script>");

	} mysqli_close($conn);
?>