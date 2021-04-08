<?php session_start();

require 'config.php';
require '../funciones.php';

$conexion = conexion($bd_config);

if (!$conexion) {
    header('Location: ../error.php');
};

comprobarSesion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //si los datos son recibidos por post
    $titulo = limpiarDatos($_POST['titulo']);
    $extracto = limpiarDatos($_POST['extracto']);
    $texto = limpiarDatos($_POST['texto']);
    $id = limpiarDatos($_POST['id']);
    $imagen_guardada = limpiarDatos($_POST['imagen-guardada']);
    $imagen = $_FILES['imagen'];
    $id_tipo = limpiardatos($_POST['tipo']);

    if (empty($imagen['name'])) { //si la imagen esta vacio
        $imagen = $imagen_guardada; //imagen va a ser la que ya estaba guardada
    } else { //sino vamos a subir la imagen
        $archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['imagen']['name']; //ruta de almacenamiento
        move_uploaded_file($_FILES['imagen']['tmp_name'], $archivo_subido);//movemos la imagen al servidor
        $imagen = $_FILES['imagen']['name']; //imagen seleccionada
    }

    $statement = $conexion->prepare( //preparamos la consulta para modificar los datos
        'UPDATE post SET titulo = :titulo, extracto = :extracto, texto = :texto, imagen = :imagen, id_tipo = :id_tipo WHERE id = :id'
    );

    $statement->execute(array(
        ':titulo' => $titulo,
        ':extracto' => $extracto,
        ':texto' => $texto,
        ':imagen' => $imagen,
        ':id_tipo' => $id_tipo,
        ':id' => $id
        
    )); //ejecutamos mediante la variable $id = limpiarDatos($_POST['id']);

    header('Location:' . RUTA . '/admin'); //nos envia al index

}else { 
    $id_articulo = idArticulo($_GET['id']);//obtiene el articulo de la pagina
    if (empty($id_articulo)) {
        header('Location:' . RUTA . '/admin');//si esta vacio no lleva al index
    }
    $post = obtenerPostPorID($conexion, $id_articulo); //obtenemos el post
    if (!$post) {
        header('Location: ../admin');//si no existe nos lleva al index
    };

    $post = $post[0]; //lo ponemos en 0 porque es un arreglo
}

require '../vistas/editar.vista.php';
?>