<?php session_start();

require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);

if (!$conexion) {
    header('Location: ../error.php');
};



if (isset($_POST['titulo'])) { //si llega un titulo
    $titulo = limpiardatos($_POST['titulo']);
    $extracto = limpiardatos($_POST['extracto']);
    $texto = $_POST['texto'];
    $imagen = $_FILES['imagen']['tmp_name'];
    $id_tipo = limpiardatos($_POST['tipo']);
    $archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['imagen']['name'] ; //almacena la ruta del archivo una vez finalizado 

    move_uploaded_file($imagen, $archivo_subido); // se utiliza para mover la imagen al servidor

    $statemet = $conexion->prepare( //preparamos la consulta para almacenar los datos en la base de dato
        'INSERT INTO post (id, titulo, extracto, texto, imagen, id_tipo, aceptada) VALUE (NULL, :titulo, :extracto, :texto, :imagen, :id_tipo, :aceptada )'   
    );

    $statemet->execute(array( //ejecutamos la consulta
        ':titulo' => $titulo,
        ':extracto' => $extracto,
        ':texto' => $texto,
        ':imagen' => $_FILES['imagen']['name'],
        ':id_tipo' => $id_tipo,
        ':aceptada' => $aceptada
    ));

    header('Location: ' . RUTA . 'index.php'); // uan vez hecho nos lleva al index
}

require 'vistas/enviar_receta.vista.php';
?>