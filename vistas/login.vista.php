<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Recetas del Pueblo</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav " style="margin-left:auto;">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo RUTA;?>index.php">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    <form name="busqueda" class="form-inline my-2 my-lg-0" action="<?php echo RUTA ;?>buscar.php" method="get">
                        <input class="form-control mr-sm-2" name="busqueda" type="search" placeholder="Busca Tu Receta" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>
            </nav>
        </div> 
        <div class="container">   
            <br><br>
            <br><br>      
            <br><br>
            <div class="container card">
                <div clas=""><br>
                    <h2 >Iniciar Sesion:</h2>
                    <div class="">                           
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" name="login"> 
                            <div class="form-group">
                                <input type="text" name="usuario" placeholder="Ingresar Usuario" class=" form-control ">    
                                    <br>            
                                <input type="password" name="contrasena"  placeholder="Ingresar Contraseña" class="form-control "> 
                                    <br>                  
                                <input type="submit" value="Ingresar" class="btn btn-primary">           
                                <br>      <br>
                                <?php if (!empty($errores)):?>
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            <?php echo $errores;?>
                                        </ul>
                                    </div>
                                <?php endif;?>        
                            </div>                                      
                        </form>
                    </div>                          
                </div>            
            </div>
        </div>   
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>        
    </body>
</html>