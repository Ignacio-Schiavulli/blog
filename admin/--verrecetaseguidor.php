<?php
require 'config.php';
require '../funciones.php';

$conexion = conexion($bd_config);

if (!$conexion) {
    header('Location: ../error.php');
};


require '../vistas/--verrecetaseguidor.vista.php';
?>