<?php
require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);

if (!$conexion) {
    header('Location: error.php');
};



   //  $statement = $conexion->prepare("SELECT * FROM  post  WHERE  "); para preparar consulta.
   // $statement->execute(); ejecutar consulta.
   // $resultados = $statement->fetchAll(); traer resultados.

   
    
require 'vistas/filtro.vista.php'

?>