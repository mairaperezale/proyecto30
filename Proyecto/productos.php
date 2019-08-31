<?php
//session_start();

include_once 'conecto.php' ;

$consulta="SELECT * FROM producto";
//$consulta2="select * from codigo_producto";

$resultado=mysqli_query($conn, $consulta);//extreamos el resultado, es decir ejecutamos la consulta
//$resultado2=mysqli_query($conn, $consulta2);
  $row=mysqli_fetch_row($resultado);//selecciona una fila para mostrar 
/*
 * array asociativo con la lista de productos disponibles en la base de datos
 * $productos['clave'] 
 * la clave sera el id_producto
 */
$productos=array();
$cont=1;
while ($fila=mysqli_fetch_array($resultado))
       {
	$key=$fila['id_producto']; 	
    $productos[$key] = array(
			'id_producto' => $fila['id_producto'], 
			'nombre' => $fila['nombre'], 
            'cantidad' => $fila['cantidad'],
			'precio' => $fila['precio'],
			'imagen' => $fila['nombreFichero'],
			'codigo_producto' => $fila['codigo_producto'],
			'descripcion' => $fila['descripcion']);
            //'descripcion' => $row ['descripcion']); 
            
  }
      


?>
