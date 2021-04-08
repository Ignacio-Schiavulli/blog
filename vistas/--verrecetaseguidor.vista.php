<!doctype html>
<html lang="en">
  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Editar Post</title>
  </head>
  <body>
    <div class="container"> <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="../admin/index.php">Recetas </a>
            <a href="cerrar.php" class="btn btn-danger" style="margin-left:auto;"> CERRAR SESION</a>
            
        </nav>
    </div> 

    <div class="container">
        <div>
            <article>
                <br>
                <h2>Editar Post</h2>
                <br>
                <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <div class="container">
                            <input type="hidden" name="id"  value="<?php echo $post['id'] ;?>">
                            <input type="text" class="form-control col-5" name="titulo" id="titulo"  value="<?php echo $post['titulo'] ;?>">
                            <br>
                            <input type="text" class="form-control" name="extracto" id="extracto" value="<?php echo $post['extracto'] ;?>">
                            <br>
                            <textarea name="texto" id="texto" class="col-12 form-control " rows="6" cols="100"><?php echo $post['texto'] ;?></textarea>
                            <br>
                            
                            <select name="tipo" id="tipo"> 
                                <option value="1">Carnes</option>
                                <option value="2">Vegetariana</option>
                                <option value="3">Pasteleria</option>
                                <option value="4">Pasta</option>
                                <option value="5">Rapida</option>
                                <option value="6">Apto Celiaco</option>
                            </select>
                            
                            <br>
                            <br>
                            <input type="file"  name="imagen">
                            <br>
                            <input type="hidden" name="imagen-guardada"  value="<?php echo $post['imagen'] ;?>">
                            <br>
                            <div class="col-12 alert alert-danger" id="error" style="display: none;" role="alert">
                              

                            </div>                           
                            <input type="submit" id="boton"
                            class="btn btn-primary" value="Aceptar">                            
                        </div>                        
                    </div>
                </form>
            </article>
        </div>
    </div>
    <script src="validarEditarNuevo.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>