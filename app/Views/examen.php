  <body>    
    <header>
      <h1>Examen de :<?php  echo $nombreTema;?></h1>      
    </header>    
        <div class="alert alert-warning" role="alert">
            Tienes <?php if($examen->tiempo_examen!="00:00:00"){
                                echo $examen->tiempo_examen;
                          }else{
                              echo'tiempo ilimatado';
                          }
            ?>  para realizar el examen.
            <br>Para superar el examen deberá tener como mínimo el <?php echo $examen->puntos_para_aprobar; ?>0% de las preguntas contestadas correctamente.
        </div>
    <section>      
      <article>
      <a class="btn btn-primary" id="atras" href="<?php echo site_url('menuProfesor/index'); ?>" role="button">Atrás</a>
            <?php
               // var_dump($preguntas);die;
                foreach($preguntas as $nlinea => $valor){
                    $respuestasArray = array();
                    $respuestasArray[] = $valor->respuestaA;
                    $respuestasArray[] = $valor->respuestaB;
                    $respuestasArray[] = $valor->respuestaC;
                    $respuestasArray[] = $valor->respuestaD;
                    shuffle( $respuestasArray);

                    echo'
                    <div>
                        <h5>'.($nlinea+1).'.-'.$valor->pregunta.' ('.$valor->puntuacion.'p.)</h5>';
                        ///var_dump($nlinea);die;
                            foreach($respuestasArray as $nrespuestas => $valorResp){
                                echo' <div class="form-check">
                                        <input class="form-check-input" type="radio" name='.($nlinea+1).' id="'.$valorResp.'" value="option1">

                                        <label class="form-check-label" for="exampleRadios">
                                            '.$valorResp.'
                                        </label>
                                        </div>';
                            }
                    
                        echo' </div><br>';

                }
            ?>
        


      </article>      
    </section>
   
  