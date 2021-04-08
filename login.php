<?php session_start();
    require 'funciones.php';
    require 'admin/config.php';
    $errores = '';
    if (isset($_SESSION['usuario'])) { //comprobamos si la sesion esta seteada
        header('Location: admin/index.php');
    }

    $conexion = conexion($bd_config);

    if (!$conexion) {
        header('Location: ../error.php');
    };
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { //preguntamos si lo campturado mediante el post y enviados
        $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING); //recibimos a travez de un filtrado el nombre de usuario y lo pasamos a misnuscula con strtolower y FILTER_SANITIZE_STRING luego para eliminar todas las etiquetas HTML de una cadena 
        $contrasena = $_POST{'contrasena'}; //almacenamos la contrseña

        //tambien podriamos hashear la contraseña is la tuvieramos encriptada utilizando la siguiente linea.

        //$contrasena = hash('sha512', $contrasena);

        $statement = $conexion->prepare(
            "SELECT * FROM admin WHERE usuario = :usuario AND contrasena = :contrasena "
        ); // preparamos la consulta para el usuario

        $statement->execute(array( //ejecutames la consulta
            ':usuario' => $usuario,
            ':contrasena' => $contrasena
        ));
 
        $resultado = $statement->fetch(); //aqui guardamos el resultado de la consulta en una variable

        if ($resultado !== false) { //si los resultados son diferente a false
            $_SESSION['usuario'] = $usuario;//creamos una sesion donde usuario es igual a usuario
            header('Location: admin/index.php');//redirijimos a index del admin
        }else {//de lo contrario imprimimos 
            $errores .= '<li> Datos Incorrectos </li>';
        }
    }
    require 'vistas/login.vista.php';
?>