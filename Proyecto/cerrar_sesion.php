<?php
session_start();
/*
 * destruimos la variable de sesion
 * tambien se puede hacer
 * unset($_SESSION['auth']);
 * unset($_SESSION['usuario']);
*/
unset($_SESSION);
session_destroy();//destruimos la sesion
/*
 * redireccionamos hacia el index.php
*/
header('Location: Parte1.html')?>
