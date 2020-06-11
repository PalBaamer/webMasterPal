
    <h1>Tus notas de los cursos son :</h1>

<section>      
    <article>
        <div id="tabs-3">
      <?php
        foreach($alumnoNotas as $linea=>$nvalor){
                        echo' <div id="tabs-'.$linea.'">Tema :'.$nvalor->id_curso.'<br>';
                        echo '<table>
                                    <tr>
                                        <th>#</th>
                                        <th>Tema</th>
                                        <th>Nota</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                    <td>'.$linea.'</td>';
                                    
                                        echo'
                                            <td><a href='.site_url('menuAlumno/ver_tema?id_tema='.$pvalor->id_tema.'').' target="_blank">'.$pvalor->nombre.'</a></td>';
                                                if($pvalor->id_examen!=null){
                                                    echo'<td><a href='.site_url('menuAlumno/hacer_examen?id_examen='.$pvalor->id_examen.'').'><img src="'.base_url('img/llaveAzul-40.png').'" alt="add" width="30" height="30">Examen</></a></a></td>';
                                                }
                                    echo'</tr>';
                                    
                                

                                    
                                }
                     
                        }
                    
                        echo'</table>';
                        echo'</div>';
                    }
                    ?>
        </div>
    </article> 
   
  </section>
  <aside>
    
  <h3></h3>
  </aside>