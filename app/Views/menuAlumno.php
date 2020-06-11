
    <h1>Bienvenid@ <?php echo $alumnoDatos->nombre?></h1>

  <section>      
      <article>
        <div id="tabs-1">
        
              <div class="warning alerta" >
                    Haz click para apuntarte a cada curso.Necesitarás el código de acceso al curso.
              </div>
              <div class="grid-container">
                <?php foreach($cursos as $nlinea => $valor){
                  echo'<form class="form" method="POST" action="'.site_url('menuAlumno/acceso_nuevo_curso').'">
                            <a class="boton" onclick="ActivarCampoOtroTema('.$valor->id_curso.');" > '.$valor->nombre.'</a>
                            <br><input type="hidden" value="'. $valor->id_curso.'" name="id_curso"></br>
                          <div id="clave_'.$valor->id_curso.'" style="display:none;">
                            <fieldset>

                                <label name="clave">Escribe la clave de acceso al curso :
                                  <br><input type="text" name="clave"></br>
                                  
                                </label>
                                <br>
                              <input class="boton" type="submit" value="enviar" name="enviar"></br>
                            </fieldset>
                        
                          </div>
                        </form>';
                }
                ?>
              </div>
              </div>
      </article> 
     
    </section>
    <aside>
      
    <h3></h3>
    </aside>

   