<!doctype html>
<html lang="en">
  <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Articulo: Receta</title>
  </head>
  <body>
    <div class="container"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Recetas</a>
            <a href="index.php" class="btn btn-primary" style="margin-left:auto;">Volver</a>
        </nav>
    </div> 
    <div class="container ">
        <div>
                     
            <article class="">
                <div class="row justify-content-center">                 
                    <div class="col-md-7"><br>
                        <div class="card"><br>
                            <div style="margin-left:20px; margin-right:20px;">
                                <div class="row">
                                    <div class="col-6">
                                        <h2 class="card-title" style="color:rgb(0, 153, 255);"><?php echo $post['titulo'];?></h2>
                                        <p class="card-text"><?php echo fecha($post['fecha']);?><p>                        
                                        <p class="card-text"><b><?php echo $post['extracto'];?></b></p> 
                                        
                                    </div>                               
                                    <div class="col-6">
                                        <img class="img" src="<?php echo RUTA?>imagenes/<?php echo $post['imagen'];?>" style="width:100%;"> 
                                    </div>                                            
                                </div>      
                                <br>
                                <p><?php echo nl2br($post['texto'])//usamos la funcion para respetar los espacios ?></p>
                            </div>
                            <br>
                        </div>
                    </div>                               
                </div> 
                <br>      
            </article>
        </div>       
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>