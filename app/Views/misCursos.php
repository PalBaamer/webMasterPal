
<h1>Bienvenid@ <?php echo $alumnoDatos->nombre?></h1>
    
    <section>      
        <article>
        <h3>Mis cursos</h3>
            <?php

                if(empty($cursosProcesando)){

                $alerta="No hay cursos registrados";
                echo' sinCursos('.$alerta.');';

                }else{
                    echo'<div id="tabs">
                    <ul>';
                   // var_dump($cursosCompletos);die;
                    foreach($cursosProcesando as $linea=> $valor){
                    echo'<li><a href="#tabs-'.$linea.'">'.$valor->nombre.'</a></li>
                            ';
                }
                    echo'</ul>';

                    foreach($cursosProcesando as $nlinea=>$nvalor){
                        echo' <div id="tabs-'.$nlinea.'">Tema :'.$nvalor->id_curso.'<br>';
                        foreach($cursosCompletos as $plinea=>$pvalor){
                            if($plinea==$nlinea){
                                if($pvalor->id_curso==$nvalor->id_curso){

                                    echo $pvalor->nombre.'<br>';
                                }
                                
                        
        
                            }
        
                        }
                    
                        
                    }
                           

                    echo'</div>';
            }
            
            /*foreach($cursosProcesando as $nlinea=>$nvalor){
                
                echo' <div id="tabs-'.$linea.'">'.$nvalor->id_curso.'<br>';
                foreach($cursosCompletos as $plinea=>$pvalor){
                    if($nvalor->id_curso==$pvalor->id_curso){
                        echo $pvalor->nombre.'<br>';

                    }

                }
                
            }*/
            ?>
                
        </article>
    </section>    