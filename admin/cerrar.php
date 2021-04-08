<?php session_start();

require 'config.php';

session_destroy();//destruimos la sesion

$_SESSION = array();//limpiamos la sesion

header('Location:'. RUTA . 'login.php'); //nos envia a login

//se peude agregar die(); para romper la pag


?>