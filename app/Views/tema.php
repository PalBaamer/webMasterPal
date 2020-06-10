<section>  
        <article id="cuerpo">
        <a class="btn btn-primary" href="<?php echo site_url('menuAlumno/misCursos'); ?>" role="button">Atrás</a>    
    
        <h5>Hola <?php echo $alumnoDatos->nombre?></h5> 
        <h2><?php echo $tema->nombre?></h2>
            <div>
                
                <?php  echo $tema->cuerpo_tema?>
            </div>
        </article>
    </section>  