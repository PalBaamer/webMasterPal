
<h1>Bienvenid@ <?php echo $alumnoDatos->nombre?></h1>
    
    <section>      
        <article>
        <h3>Mis cursos</h3>
            <?php
        //var_dump($cursosProcesando."     y     ".$cursosCompletos);die;
                if(empty($cursosProcesando)){

                $alerta="No hay cursos registrados";
                echo' sinCursos('.$alerta.');';

                }else{
                    echo'<div id="tabs">
                    <ul>';
                   //var_dump($cursosProcesando);die;
                    foreach($cursosProcesando as $linea=> $valor){
                    echo'<li><a href="#tabs-'.$linea.'">'.$valor->nombre.'</a></li>
                            ';
                }
                    echo'</ul>';

                    foreach($cursosProcesando as $nlinea=>$nvalor){
                        echo' <div id="tabs-'.$nlinea.'">Tema :'.$nvalor->id_curso.'<br>';
                        echo '<table>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Examen</th>
                                    </tr>';
                        foreach($cursosCompletos as $plinea=>$pvalor){
                            
                                if($pvalor->id_curso==$nvalor->id_curso){
                                    echo '<tr>
                                    <td>'.$plinea.'</td>';
                                    
                                        echo'
                                            <td><a href='.site_url('menuAlumno/ver_tema?id_tema='.$pvalor->id_tema.'').' target="_blank">'.$pvalor->nombre.'</a></td>';
                                                if($pvalor->id_examen!=null){
                                                    echo'<td><a href='.site_url('menuAlumno/hacer_examen?id_examen='.$pvalor->id_examen.'').'><img src="'.base_url('img/llaveAzul-40.png').'" alt="add" width="30" height="30">Examen</></a></a></td>';
                                                }
                                    echo'</tr>';
                                    
                                

                                    
                                    
                                    //echo $pvalor->nombre;
                                   /* echo $pvalor->nombre.'<br>'       ;*/
                                }
                     
                        }
                    
                        echo'</table>';
                        echo'</div>';
                    }
                           

                   
            }
            ?>
                
        </article>
    </section>    