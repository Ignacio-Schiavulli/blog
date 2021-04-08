<?php

require 'config.php';
require '../funciones.php';

$conexion = conexion($bd_config);

if (!$conexion) {
    header('Location: ../error.php');
};

$id = limpiarDatos($_GET['id']); //obtenemos el id

if (!$id) {
    header('Location:' . RUTA . '/admin');
}

$statement = $conexion->prepare('DELETE FROM post WHERE id = :id');//acemos la consulta para borrar el articulo
$statement->execute(array('id' => $id));//ejecutamaos

header('Location:' . RUTA . '/admin');//direccionamos

?>