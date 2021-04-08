<?php session_start();
    require 'config.php';
    require '../funciones.php';

    $conexion = conexion($bd_config);

    if (!$conexion) {
        header('Location: ../error.php');
    };
    $mensaje = '';
    comprobarSesion();
    if (isset($_GET['id_aceptar'])){
        $mensaje = aceptarReceta($_GET['id_aceptar'],$conexion);
    }
    $posts = obtenerPost($blog_config['post_por_pagina'], $conexion , true); 
    
    

    require '../vistas/panel.vista.php';
?>