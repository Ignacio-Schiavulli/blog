<nav aria-label="Page navigation example" style="margin-top: 10px;">
    <?php $numero_paginas = numeroPaginas($blog_config['post_por_pagina'], $conexion);  ?>
        <ul class="pagination justify-content-center"> 
            <?php if (paginaActual() === 1) : //si es igual 1 mostramos el boton desabilitado?>
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            <?php else: //sino el boton normal?>
                <li class="page-item">
                    <a class="page-link" href="index.php?p=<?php echo paginaActual() - 1;?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                    </a>
                </li>
            <?php endif;?>
            <?php for($i = 1; $i <= $numero_paginas; $i++): // con este for vamos a mostrar la cantidad de paginas ?>
                <?php if(paginaActual()=== $i): //aca preguntamos si la pagina actual es igual a i?>
                    <li class="page-item active"><a class="page-link" href="index.php?p=<?php echo $i;?>"> <?php echo $i;?></a></li> <!--si es asi cargamos esta etiqueta como activa-->
                <?php else:?>
                <li class="page-item"><a class="page-link" href="index.php?p=<?php echo $i;?>"><?php echo $i;?></a></li> <!-- de lo contrario esta como no activa-->
                <?php endif;?>
            <?php endfor;?>
            <?php if(paginaActual() == $numero_paginas):// aca preguntamos si pagina actual es igual al numero de pagina?>
                <li class="page-item disabled">
                    <span class="page-link">&raquo;</span> <!-- mostramos este boton deshabilitado-->
                </li>
            <?php else:// de lo contrario mostramos el boton como habilitado?>
                <li class="page-item ">   
                    <a class="page-link" href="index.php?p=<?php echo paginaActual() + 1; // con esto traemos la pagina ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                    </a>
                </li>
            <?php endif;?>            
        </ul>
    </nav>