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
                <form name="busqueda" class="form-inline my-2 my-lg-0" action="<?php echo RUTA;?>admin/buscaradmin.php" method="get">
                    <input class="form-control mr-sm-2" name="busqueda" type="search" placeholder="Busca Tu Receta" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    <a href="cerrar.php" style="margin-left: 10px;" class="btn btn-danger" > CERRAR SESION</a> 
                </form>
                
            </div>
        </nav>
    </div> 
    <div class="container">
    <br>
   
    <h2><?php echo $titulo; ?></h2> 
            
        
            <?php foreach($resultados as $post):?>             
                <br>
                <div class="border-bottom border-dark" style="display: flex;">
                <img class="" style="width:200px; height: 140px; " src="<?php echo RUTA?>imagenes/<?php echo $post['imagen'];?>" alt="Card image cap">
                <div style="margin-left: 20px;height: 160px;"> 
                    <h5><?php echo $post['id'] ."-" . $post['titulo'];?></h5>
                    <br>
                    <a href="editar.php?id=<?php echo $post['id'];?>" class="btn btn-primary">Editar</a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Borrar</button>
                    
                </div>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color:red; margin-left:auto;">!!ATENCIÓN!!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        ¿Deseas eliminar por completo esta receta?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <a href="borrar.php?id=<?php echo $post['id'];?>" class="btn btn-primary">Borrar</a>
                      </div>
                    </div>
                  </div>
                </div>            
            </div>

            <?php endforeach;?>
        
    </div>
    <br><br>
    <?php require '../paginacion.php';?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>