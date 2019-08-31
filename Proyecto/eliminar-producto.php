<?php
/*
 * este script elimina el producto seleccionado
 * del carrito 
 */
session_start();// iniciar la sesion
/*
 * obtener el valor de la clave de producto 
 * pasada al script desde la pagina carrito_de_compras.php
 * por medio de la URL 
 */
$clave = $_GET['clave'];
/*
 * eliminar el producto seleccionado
 */
unset($_SESSION['carrito'][$clave]);
$importe_total=0;

/*
 * redireccionamos a la pagina principal del carrito, carrito_de_compras.php
 */
header('Location: carrito-de-compra.php');