<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Panel de Control</title>
  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
          <a class="navbar-brand" href="../admin/index.php">Panel de control</a>
          
          <form style="margin-left:auto;" name="busqueda" class="form-inline my-2 my-lg-0" action="<?php echo RUTA ;?>admin/buscaradmin.php" method="get">
              <input class="form-control mr-sm-2" name="busqueda" type="search" placeholder="Busca Tu Receta" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
          </form>
          
     </nav>

    </div> 
    <div class="container">
        <br>
        <a href="nuevo.php" class="btn btn-primary"> NUEVO POST</a> 
        <a href="--recetaseguidor.php" class="btn btn-primary">ACEPTAR RECETAS</a>
        <a href="cerrar.php"  class="btn btn-danger" > CERRAR SESION</a>             
        <br>
        <br>
        
        <?php foreach($posts as $post):?>
        
            <div class="border-bottom border-dark" style="display: flex;">
            
                <img class="" style="width:200px; height: 140px; " src="<?php echo RUTA?>imagenes/<?php echo $post['imagen'];?>" alt="Card image cap">
                <div style="margin-left: 20px;height: 160px;"> 
                    <h5><?php echo $post['id'] ."-" . $post['titulo'];?></h5>
                    <br>
                    <a href="editar.php?id=<?php echo $post['id'];?>" class="btn btn-primary">Editar</a>
                    <a href="borrar.php?id=<?php echo $post['id'];?>" class="btn btn-primary">Borrar</a>
                    
                </div>
                           
            </div>
            <br>
        <?php endforeach;?>
        <br>              
    </div>
   <?php require '../paginacion.php';?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>