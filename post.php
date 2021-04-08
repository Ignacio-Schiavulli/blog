<?php
require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);

$id_articulo = idArticulo($_GET['id']); // aca obtenemos el id del articulo.

if (!$conexion) {
    header('Location: error.php');
}

if (empty($id_articulo)) {
    header('Location: index.php'); // si esta vacio lo enviamos index
}

$post = obtenerPostPorId($conexion, $id_articulo);

if (!$post) {
    header('Location: index.php'); // si no existe nos lleva al index
}

$post = $post[0];

require 'vistas/post.vista.php';
?>