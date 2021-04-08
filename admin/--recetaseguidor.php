<?php
require 'config.php';
require '../funciones.php';

$conexion = conexion($bd_config);

if (!$conexion) {
    header('Location: ../error.php');
};

$resultados = obtenerPost($blog_config['post_por_pagina'], $conexion , false, true); 

require '../vistas/--recetaseguidor.vista.php';
?>