<?php
/*
 * este script vacia el carrito completamente
 */

// inciamos sesion 
session_start();
/*
 * limpiamos las variables de sesion 
 */// limpiar la variable de sesion carrito
unset($_SESSION['carrito']);
// redireaccionar hacia la pagina catalogo_de_productos
header('Location: carrito-de-compra.php');