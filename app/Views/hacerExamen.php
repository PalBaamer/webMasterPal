<script>
///function cronometroStart(hora){		
// Set the date we're counting down to
window.onload = function cronometroStart(){
  var reloj='<?= $examen[0]->tiempo_examen;?>';

  var arrayT = reloj.split(":");

    var hora = parseInt(arrayT[0]);

    var minuto = parseInt(arrayT[1]);
console.log("hora "+hora+" minuto "+minuto);

var countDownDate = new Date();
countDownDate.setHours( countDownDate.getHours() + hora );

countDownDate.setMinutes( countDownDate.getMinutes() + minuto );

// Update the count down every 1 second
var x = setInterval(function() {
  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  console.log(distance);

  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML =hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
}
</script>



<section>  
        <article  onload="alert('Ejecuta OK2')";>
       <!-- cronometroStart(<?= $examen[0]->tiempo_examen?>)";-->
       <?php
          if($examenH==null){
          echo' <a class="botonAtras" href="'.site_url('menuAlumno/misCursos').'" role="button">Atrás</a>';    
        }
        //var_dump($alumnoDatos->nombre);die;
        ?>
        <h5>Hola <?php echo $alumnoDatos->nombre?></h5> 
                <div class="warning alerta" >
                        <?php echo 'El examen consta de X preguntas con un total máximo de '.$examen[0]->total_examen.' puntos.
                            Se deberá superar el '.$examen[0]->puntos_para_aprobar.'0% del examen para que esté aprobado.
                            Tiempo del examen '.$examen[0]->tiempo_examen.'<br>';
                            
                            if($examenH==null){
                            echo'Si empiezas el examen, luego, no podrás volver atrás'; 
                            }echo'
                        
                                  
                </div>';
                if($examenH==null){
                echo'<a class="botonExamen" href="'.site_url('menuAlumno/empezar_examen?id_examen='.$examen[0]->id_examen.'').'" role="button"> Empezar Examen</a>';
                }
                            ?>
                <div class="form_examen">
                  <?php
                  //var_dump($examenH);die;
                  if($examenH!=null){
                    //var_dump($examenH);die;
                    echo'
                    <form class="form" class="form " method="POST" action="'.site_url('menuAlumno/corregir_examen').'">
                    
                      <input id="prodId" name="id_examen" type="hidden" value="'.$examenH[0]->id_examen.'">
                      <input id="prodId" name="id_alumno" type="hidden" value="'.$alumnoDatos->id_alumno.'">
                      <input id="prodId" name="notaAprobar" type="hidden" value="'.$examen[0]->puntos_para_aprobar.'">';
                        foreach($examenH as $nlinea => $valor){
                            $respuestasArray = array();
                            $respuestasArray[] = $valor->respuestaA;
                            $respuestasArray[] = $valor->respuestaB;
                            $respuestasArray[] = $valor->respuestaC;
                            $respuestasArray[] = $valor->respuestaD;
                            shuffle( $respuestasArray);
                            //var_dump($examenH);die;
                            echo'
                            <div>
                                <h5>'/*pregunta*/ .($nlinea+1).'.-'.$valor->pregunta.' ('.$valor->puntuacion.'p.)</h5>
                                
                                <input id="prodId" name="id_pregunta_'.$nlinea.'" type="hidden" value="'.$examenH[$nlinea]->id_pregunta.'">
                                <input id="prodId" name="nota_'.$nlinea.'" type="hidden" value="'.$valor->puntuacion.'">';
                                
                                
                                    foreach($respuestasArray as $nrespuestas => $valorResp){
                                      
                                        echo' <div class="form-check">
                                                <input class="form-check-input" type="radio" name="respuestaExamen'.($nlinea+1).'"
                                                 id="'.($nlinea+1).'_respuesta_'.($nrespuestas+1).'"  value="'.$valorResp.'">
    
                                                <label class="form-check-label" for="'.($nlinea+1).'_respuesta_'.($nrespuestas+1).'">
                                                    '.$valorResp.'
                                                </label>
                                                </div>';
                                                
                                    }
                                    
                                echo' </div><br>';
                                //var_dump($examenH[1]->id_pregunta);die;
                        }
                        
                        echo'
                        <input id="prodId" name="npreguntas" type="hidden" value="'.($nlinea+1).'">
                        <button class="botonExamen" type="submit" > Enviar examen</button>
                    </form>';
                  }
                    ?>
                
                </div>
        </article>
    </section>  







 