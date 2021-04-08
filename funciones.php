<?php

// los ":" en las consultas sirven para que los valores reales sean sustituidos cuando la sentencia sea ejecutada.

//define declara la constante tanto en minuscula como en mayuscula


function conexion($bd_config){
    try {
        $conexion =new PDO('mysql:host=localhost;dbname='.$bd_config['basededatos'], $bd_config['usuario'], $bd_config['contrasena']);
        return $conexion;
    } catch (PDOException $e) {
        return false;
    };
};

function limpiarDatos($datos){
    $datos = trim($datos); //elimina los espacion al principio y al final
    $datos = stripcslashes($datos); // quita barras
    $datos = htmlspecialchars($datos);
    return $datos;
}
 
function paginaActual(){
    return isset($_GET['p']) ? (int)$_GET['p'] : 1; //retorna si la variable get esta seteada con el valor de "p" que es de la pagina y de otra forma retorna 0
};

function obtenerPost($post_por_pagina, $conexion, $solo_aceptadas = false, $solo_por_aceptar = false){
    $inicio = (paginaActual() > 1) ? paginaActual() * $post_por_pagina - $post_por_pagina : 0; //guarda desde que pagina traemos los post 
    if ($solo_aceptadas == true){
        $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM post WHERE aceptada = 1 LIMIT $inicio, $post_por_pagina"); //se prepara la consulta para traer los post con un limite de articulos $inicio y los post pertenecientes.
    }else if ($solo_por_aceptar){
        $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM post WHERE aceptada = 0 or aceptada IS null LIMIT $inicio, $post_por_pagina"); 
    }else{
        $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM post LIMIT $inicio, $post_por_pagina"); 
    }
    // SQL_CALC_FOUND_ROWS Sirve para saber cuantos articulos tenemos en la base de datos y cualcular cual va ser el numero de la pag.
    $sentencia->execute(); //se ejecuta la consulta.
    return $sentencia->fetchAll();//retorna los resultados.
}

function numeroPaginas($post_por_pagina, $conexion){
    $total_post = $conexion->prepare('SELECT FOUND_ROWS() as total'); //calculamos a travez de la consulta el numero de las filas utilziando FOUND_ROWS() y lo guardamos en total.
    $total_post->execute();// ejecutamos la consulta
    $total_post = $total_post->fetch()['total'];// aca le decimos devuelva un arreglo con el indice de total de la consulta.
    $numero_paginas = ceil($total_post / $post_por_pagina);//aca hacmeos el calculo para hacer la paginacion. pasamos un ceil() para redodnear hacia arriba el resultado.
    return $numero_paginas;//retornamos el numero.
}
function aceptarReceta($id, $conexion){
    $sql = $conexion->prepare("UPDATE post SET aceptada = 1 WHERE id = $id"); //calculamos a travez de la consulta el numero de las filas utilziando FOUND_ROWS() y lo guardamos en total.
    $sql->execute();// ejecutamos la consulta
    
}

function idArticulo($id){
    return (int)limpiarDatos($id); // retornamos el id y lo pasamos casteamos int para que el usuario no pueda inyectar un codigo que no sea numero en la barra de busqueda.

}

function ObtenerPostPorId($conexion, $id){
    $resultado = $conexion->query("SELECT * FROM post WHERE id = $id LIMIT 1"); // guardamos en resultado la consulta para traer el post correspodiente con un limite de 1
    $resultado = $resultado->fetchAll(); //ejecutamos la consulta
   
    return ($resultado) ? $resultado : false;// retornamos a travez de una condicion al articulo si existe de lo contrario nos devuelve falso
    
}

function fecha($fecha){
    $timestamp = strtotime($fecha);//guardamos en timestamp lo que convertimos en una cadena de texto a tiempo
    $meses = ['Enero', 'Febrero','Marzo','Abril','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];// creamos un arreglo con todos los meses
    $dia = date('d', $timestamp);//guardamos el dia correspodiente
    $mes = date('m', $timestamp) -1;//mes correspondinete y para que se adapte debemos aplicarle -1
    $anio = date('y', $timestamp);//año correspondiente
    $fecha = "$dia de " . $meses[$mes] . " del 20$anio"; // y aqui traducimos la fecha completa
    return $fecha; //retornamos la traduccion
}

function comprobarSesion(){
    if (!isset($_SESSION['usuario'])) {
        header('Location: '. RUTA . 'login.php');
    }
}
?>