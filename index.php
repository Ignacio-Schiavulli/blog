<?php 
 require 'admin/config.php';
 require 'funciones.php';

 $conexion = conexion($bd_config);

 if (!$conexion) {
     header('Location: error.php');
 }
 
 $posts = obtenerPost($blog_config['post_por_pagina'],$conexion,true); //aca ejecutamos la funcion para obtener los posty la guardamos en la variable para luego llamarla desde el html. $blog_config['post_por_pagina'] sirve para llamar la cantidad de post por pagina del archivo config.php y la otra realiza la conexion

 if (!$posts) {
    header('Location: error.php'); //si no existen post nos lleva a la pagina de error.php.
 };

 require 'vistas/index.vista.php';
?>