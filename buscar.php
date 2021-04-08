<?php
require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);

if (!$conexion) {
    header('Location: error.php');
};
if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])) { // si el metodo capturado es por get y no esta vacio

    $busqueda = limpiarDatos($_GET['busqueda']); //campturamos lo ingresado en la barra de busqueda.

    $statement = $conexion->prepare("SELECT * FROM  post  WHERE  titulo LIKE :busqueda or texto LIKE :busqueda"); //ejecutamos la consulta para buscar lo ingresado tanto en el titulo como en el texto
    $statement->execute(array(':busqueda' => "%$busqueda%")); //ejecutamos la consulta en donde el titulo o el texto sea lo que se ingreso en la busqueda 
    $resultados = $statement->fetchAll();//aca vamnos a extraer todos los resultados

    if (empty($resultados)) { //si no se no hay articulos encontrados
        $titulo = 'No se encontraron post con el resultado: ' . '"' . $busqueda . '"' ;
        $titulo.=  '<br><br><a href="index.php" class="btn btn-primary" style="margin-left:auto;"> Volver</a>';
        
    }else {//de lo contrario
        $titulo = 'Resutados de la busqueda: '  . '"' . $busqueda . '"';

    }
} else if (isset($_GET['tipo'])){
    $busqueda = limpiarDatos($_GET['tipo']); //campturamos lo ingresado en la barra de busqueda.
    
    $consulta_sql = $conexion->prepare("SELECT * FROM  tipo  WHERE  tipo LIKE '$busqueda'"); //ejecutamos la consulta para buscar lo ingresado tanto en el titulo como en el texto
    $consulta_sql->execute(); //ejecutamos la consulta en donde el titulo o el texto sea lo que se ingreso en la busqueda 
    $resultados = $consulta_sql->fetchAll();//aca vamnos a extraer todos los resultados
    if (empty($resultados)) { //si no se no hay articulos encontrados
        $titulo = "No se encontraron post de tipo '$busqueda'";
        $titulo.=  '<br><br><a href="index.php" class="btn btn-primary" style="margin-left:auto;"> Volver</a>';
    }else {//de lo contrario
        $titulo = 'Resutados de la busqueda: '  . '"' . $busqueda . '"';
        $id_tipo = $resultados[0]['id'];
        $consulta_sql = $conexion->prepare("SELECT * FROM  post  WHERE  id_tipo = $id_tipo"); //ejecutamos la consulta para buscar lo ingresado tanto en el titulo como en el texto
        $consulta_sql->execute(array(':busqueda' => "%$busqueda%")); //ejecutamos la consulta en donde el titulo o el texto sea lo que se ingreso en la busqueda 
        $resultados = $consulta_sql->fetchAll();//aca vamnos a extraer todos los resultados

        if (empty($resultados)) { //si no se no hay articulos encontrados
            $titulo = 'No se encontraron post con el filtro: ' . '"' . $busqueda . '"' ;
            $titulo.=  '<br><br><a href="index.php" class="btn btn-primary" style="margin-left:auto;"> Volver</a>';
        }else {//de lo contrario
            $titulo = 'Resutados del filtro: '  . '"' . $busqueda . '"';
        }
    }
}else{  //si no hay datos que buscar 
    header('Location: ' . RUTA . '/index.php');
}

require 'vistas/buscar.vista.php'

?>