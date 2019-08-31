<?php
/*
 * este script agreaga el producto seleccionado
 * al carrito 
 */
session_start();// iniciar la sesion
require_once 'productos.php';// incluir el array de productos
/*
 * definir un nuevo array asociativo 
 * para almacenar los productos agregados 
 * al carrito 
 */
$carrito 	= array();
/*
 * obtener el valor de la clave de producto 
 * pasada al script desde la pagina del catalogo del producto.php
 * por medio de la URL 
 */
$clave 		= $_GET['clave'];

$cantidad 	= 1;// cantidad de productos a agregar 
/*
 * guardar en el array asociativo $producto
 * el producto seleccionado 
 * por ejemplo el array asociativo $producto 
 * tendra la siguiente estructura y datos
 * Array ( [id] => 1 [descripcion] => Les Paul standard [precio] => 9000 )
 */
$producto 	= $productos[$clave];
/*
 * verificar si el producto seleccionado ya esta en el carrito 
 * si esta, agregar uno a la cantidad de producto en el carrito
 */
if (isset($_SESSION['carrito'][$clave])) {
	
	$cantidad+=$_SESSION['carrito'][$clave]['cantidad'];
	$_SESSION['carrito'][$clave]['cantidad'] = $cantidad;
	
} 
/*
 * si el producto no esta en el carrito agregarlo
 * al carrito
 */
else {
     /*
     * agreqagamos los productos en el carrito
     */
	$carrito = array(
			'id_producto' => $producto['id_producto'], 
			'nombre' => $producto['nombre'], 
            'cantidad' => $cantidad,
			'precio' => $producto['precio'],
			'imagen' => $producto['foto'],
			'codigo_producto' => $producto['codigo_producto'],
			'descripcion' => $producto['descripcion']
			);
	/*
	 * guardar los productos del carrito en una 
	 * variable de sesion
	 */ 
	$_SESSION['carrito'][$clave] = $carrito;

}/*
 * redireccionamos a la pagina carrito_de_compras.php
 */

header('Location: carrito-de-compra.php');