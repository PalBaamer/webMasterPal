<head>

        <script type="text/javascript">
               /*     $(document).ready(function(){
                        var maxField = 10; 
                        //Input fields increment limitation
                        var addButton = $('.add_button'); 
                        //Add button selector
                        var wrapper = $('.field_wrapper'); 
                        //Input field wrapper
                        var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="remove-icon.png"/></a></div>'; //New input field html 
                        var x = 1; 
                        //Initial field counter is 1
                        $(addButton).click(function(){ 
                            //Once add button is clicked
                            if(x < maxField){ 
                                //Check maximum number of input fields
                                x++; 
                                //Increment field counter
                                $(wrapper).append(fieldHTML); // Add field html
                            }
                        });
                        $(wrapper).on('click', '.remove_button', function(e){ 
                            //Once remove button is clicked
                            e.preventDefault();
                            $(this).parent('div').remove(); 
                            //Remove field html
                            x--; 
                            //Decrement field counter
                        });
                    });*/
        </script>

</head>
<body>

    <a class="btn btn-primary" href="<?php echo site_url('menuProfesor/index')?>" role="button">Atrás</a>
                        
<div id="cuerpo">
                            <a class="btn btn-primary" href="<?php echo site_url('menuProfesor/index'); ?>" role="button">Atrás</a>
    <section>
        <article>
            <div id="preguntas">
                    Hola aquí pantalla de vista crearPreguntasExamen.php
                    <?php echo var_dump("EL ID DEL TEMA ES :".$id_examen);?>
                <form  class="form" class="form" method="POST" action="<?php echo site_url('menuProfesor/guardar_preguntas'); ?> ">
                            <br>
                            
                            <input name="id_examen" type="hidden" value="<?php echo $id_examen?>">
                            <input name="n_preguntas" type="hidden" value="<?php echo $nPreguntas?>">
                                    <?php
                                        for ($i=0; $i < $nPreguntas; $i++) { 
                                            echo'
                                    


                                                    <label class="labelPreguntas">Escribe la pregunta :</label>
                                                    <br>
                                                    <input class="inputPreguntas" type="text" name="pregunta_'.$i.'" require>
                                                    <br>

                                                    <label class="labelPreguntas">Escribe la respuesta correcta :</label>
                                                    <br>
                                                    <input class="inputPreguntas" type="text" name="respuestaD_'.$i.'" require>
                                                    <br>

                                                    <label class="labelPreguntas">Escribe la respuesta A :</label>
                                                    <br>
                                                    <input class="inputPreguntas" type="text" name="respuestaA_'.$i.'" require>
                                                    <br>

                                                    <label class="labelPreguntas">Escribe la respuesta B :</label>
                                                    <br>
                                                    <input class="inputPreguntas" type="text" name="respuestaB_'.$i.'" require>
                                                    <br>

                                                    <label class="labelPreguntas">Escribe la respuesta C :</label>
                                                    <br>
                                                    <input class="inputPreguntas" type="text" name="respuestaC_'.$i.'" require>
                                                    <br></br>

                                                    <label class="labelPreguntas">¿Cuánto vale esta pregunta?(1-10)</label>
                                                    <br>
                                                    <input class="inputPreguntas" type="number" min="0.25" max="10" step="0.25" name="nota_'.$i.'" require>  
                                                    <br>';
                                        }
                                    ?>
                                
                            <input class="labelPreguntas" type="submit" value="Guardar y salir" name="save">
                                
                    
                </form>
            </div>
        </article>
    </section>
</div>
</body>