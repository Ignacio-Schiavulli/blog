<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Recetas</title>
  </head>
  <body>
    <div class="container">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Recetas del Pueblo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav " style="margin-left:auto;">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <form name="busqueda" class="form-inline my-2 my-lg-0" action="<?php echo RUTA;?>buscar.php" method="get">
                    <input class="form-control mr-sm-2" name="busqueda" type="search" placeholder="Busca Tu Receta" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
    </div> 
    <div class="container">
    <br>
    <h2><?php echo $titulo; ?></h2>  
        <div class="row">   
            <?php foreach($resultados as $post):?>             
                <article class="col col-sm-4">
                <br>
                    <div class="card" style="width: 18rem;margin-left: auto; margin-right: auto;">
                        <img class="card-img-top" src="<?php echo RUTA?>imagenes/<?php echo $post['imagen'];?>">
                        <div class="card-body">
                            <h5 class="card-title"><a href="#"><?php echo $post['titulo']?></a></h5>
                            <p class="card-text"><?php echo fecha($post['fecha']);?></p>                      
                            <p class="card-text"><?php echo $post['extracto'];?></p>
                            <div class="col-12 alert alert-danger" id="error" style="display: none;" role="alert">
                                <h4>Completar los campos faltantes</h4>
                            </div>
                            <div >
                                <a class="btn btn-primary" href="post.php?id=<?php echo $post['id'];?>" > Leer más ...</a>                            
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach;?>
        </div>
    </div>
    <br><br>
    <?php require 'paginacion.php';?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>