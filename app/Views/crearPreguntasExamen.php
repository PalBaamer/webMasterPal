<body>

<div id="cuerpo">
        <a class="btn btn-primary" href="<?php echo site_url('menuProfesor/index'); ?>" role="button">Atrás</a>
    <section>
        <article>
            <div id="preguntas">
                <form  class="form" class="form" method='POST' action="<?php echo site_url('menuProfesor/crear_preguntas'); ?>">
                    <br>
                    <input name="id_examen" type="hidden" value="<?php echo $id_examen; ?>">
                    <label class="labelPreguntas">Escribe la pregunta :</label>
                    <br>
                    <input class="inputPreguntas" type="text" name="pregunta" require>
                    <br>
                    <label class="labelPreguntas">Escribe la respuesta correcta :</label>
                    <br>
                    <input class="inputPreguntas" type="text" name="respuestaCorrecta" require>
                    <br>
                    <label class="labelPreguntas">Escribe la respuesta A :</label>
                    <br>
                    <input class="inputPreguntas" type="text" name="respuestaA" require>
                    <br>
                    <label class="labelPreguntas">Escribe la respuesta B :</label>
                    <br>
                    <input class="inputPreguntas" type="text" name="respuestaB" require>
                    <br>
                    <label class="labelPreguntas">Escribe la respuesta C :</label>
                    <br>
                    <input class="inputPreguntas" type="text" name="respuestaC" require>
                    <br></br>
                    <label class="labelPreguntas">¿Cuánto vale esta pregunta?(1-10)</label>
                    <br>
                    <input class="inputPreguntas" type="number" min="0" max="10" step="0.25" name="nota" require>  
                    <br>
                    <input class="labelPreguntas" type="submit" value="Guardar y añadir más" name="addMore">
                    <input class="labelPreguntas" type="submit" value="Guardar y salir" name="save">

                </form>
            </div>
        </article>
    </section>
</div>
</body>