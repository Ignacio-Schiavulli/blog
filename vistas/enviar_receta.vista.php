<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Enviar receta</title>
  </head>
  <body>
<div class="container"> <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Enviar receta</a>    
    </nav>
</div> 
<div class="container">
        <div>
            <article>
                <br>
                <h2></h2>
                <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">                   
                    <div class="container">                      
                        <input type="text" class="form-control col-3" name="titulo" id="titulo" placeholder="Titulo Del Post">
                        <br>
                        <input type="text"  class="form-control" name="extracto" id="extracto"  placeholder="Extracto Del Post">
                        <br>
                        <textarea name="texto" id="texto" rows="7" class="col-12 form-control " placeholder="Texto Del Post"></textarea>
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
                        <input type="file" class="col-12  " name="imagen" id="imagen">
                        <br><br>
                        <div class="col-12 alert alert-danger" id="error" style="display: none;" role="alert">
                            <p>Por favor completa los campos faltantes</p>
                        </div>
                        <input class="btn btn-primary" type="submit" id="boton" value="Crear Post"> 
                    </div>    
                </form>
            </article>
        </div> 
</div>
    <script >
            var titulo = document.getElementById('titulo');
            var extracto = document.getElementById('extracto');
            var texto = document.getElementById('texto');
            var imagen = document.getElementById('imagen');
            var boton = document.getElementById('boton');
            var exito = document.getElementById('exito');
            var error = document.getElementById('error');

            boton.addEventListener('click', function (e) {
                
                if (titulo.value == '') {
                    e.preventDefault();
                    error.style.display ='block'
                }
                if (extracto.value == '') {
                    e.preventDefault();
                    error.style.display ='block'
                }
                if (texto.value == '') {
                    e.preventDefault();
                    error.style.display ='block'
                }
                
                if (titulo.value == '' && extracto.value == '' && texto.value == '') {
                    e.preventDefault();
                    
                    error.style.display = 'none'        
            }
                
            })
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html> 