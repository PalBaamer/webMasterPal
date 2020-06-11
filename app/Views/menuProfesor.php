
  <body class="text-center">
  <?php

    echo '<h1>Bienvenid@ '.$profesorDatos->nombre.'</h1>';
    
  ?>
  
<div>
  <section>
        <table class="table" style="width:100%">
              <tr>
                  <td>
                      <div id="tabs" style="width:50%">
                            <ul>
                              <li><a href="#tabs-1">Crear Curso</a></li>
                              <li><a href="#tabs-2">Editar Curso</a></li>
                              <li><a href="#tabs-3"> Buscar Alumno</a></li>
                              <li><a href=<?php echo site_url('loginProfesor/registro'); ?>>Crear Alumno</a></li>
                            </ul>
                          <div id="tabs-1">
                            <form class="form" class="form " method='POST' action="<?php echo site_url('menuProfesor/crear_curso'); ?>">
                            <h3 class="h3 mb-3 font-weight-normal">Introduce el nombre del curso :</h3>
                            <input type="text" class="form-control" name="inputInsertCurso" placeholder="Nombre del curso" require>
                            <h3 class="h3 mb-3 font-weight-normal">Introduce el nombre del tema :</h3>
                            <input type="text" class="form-control" name="inputInsertTema" placeholder="Nombre del primer tema " require>
                            <br>
                            <label>Introduce la contraseña del curso : </label>
                            <input type="number" min="2" max="9999" name="pswd" value="1111" require>    
                              <p> <input type="submit" value="Crear"></p>
                            </form>
                          </div>

                        <!-------------------------------------CURSO A EDITAR------------------------------------>  
                          <div id="tabs-2">
                              <form class="form" class="form " method='POST' action="<?php echo site_url('menuProfesor/ver_curso'); ?>">
                                    <h3 class="h3 mb-3 font-weight-normal">Elige el curso a editar:</h3>
                                          <div id="volver" class="dropdown">
                                            
                                              <?php
                                                  if($cursos!=null){
                                                  echo'<select class="custom-select" name="id_curso">';
                                                        // var_dump($cursos);die;
                                                        foreach ($cursos as $nlinea => $valor) {
                                                                  //var_dump($valor->nombre);die;
                                                          echo '<option class="dropdown-item" value="' .$valor->id_curso.'">'.$valor->nombre.'</option>';
                                                        }
                                                  echo' </select>';
                                                  }else{
                                                    echo' <button class="btn btn-secondary dropdown-toggle disabled" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-disabled="true">
                                                          No existen Cursos
                                                          </button>';

                                                        
                                                  }
                                              ?>
                                            </div>

                                      <p>  </p><button class="btn btn-lg btn-primary btn-block" type="submit" >Editar</button>
                                      <p></p>
                                      <p> <!---input type="submit" value="Crear"--></p>
                                    </form>

                          
                          </div>

                          <div id="tabs-3">
                                <form class="form" class="form " method='POST' action="<?php echo site_url('menuProfesor/buscar_alumno'); ?>">
                                <h3 class="h3 mb-3 font-weight-normal">Escribe el nombre alumno</h3>

                                <label for="inputAlumno" class="sr-only">Nombre del alumno</label>
                                  <input type="text" class="form-control" name="inputAlumno" placeholder="Nombre">

                                  <p>  </p><button class="btn btn-lg btn-primary btn-block" type="submit" >Buscar</button>
                                  <p></p>
                              
                                  
                                </form>
                                
                          </div>




                      </div>
                  </td>
                  <td>
                    <!-------------------------------------CURSOS MEDIA Y N.ALUMNOS------------------------------------>
                      <div>
                      <h3>TUS CURSOS</h3>
                      <table class="table table-striped .table-striped">
                                      <thead>
                      <thead>
                                        <tr>
                                          <td scope="col">#</td>
                                          <th scope="col">Nombre</th>
                                          <th scope="col">N. Alumnos</th>
                                          <th scope="col">Media/Curso</th>
                                        </tr>
                                        
                                        <?php //var_dump($cursos);die;
                    if($cursoAlumnos!=null){
                                      

                                        foreach ($cursoAlumnos as $nlinea => $valor) {
                                          echo '<tr><td scope="row">'.$nlinea.'</td><td>' . $valor->nombre. '</td><td>' . $valor->nAlumnos. '</td><td> <div class="progress">
                                          <div class="progress-bar" role="progressbar" style="width: 72%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">7,2</div>
                                      </div></td></tr>'
                                         ;
                                      }
                                    }
                                  
                                  
                                    ?>
                                        
                                        </thead>
                                      <tbody>
                                      </tbody>
                                    </table>
                      </div>
                  </td>
              </tr>
        </table>
        <div> 
       
        <!-------------------------------------ENSEÑA EL ALUMNO BUSCADO---------------------->
                 <?php //var_dump($datosAlumno);die;
                          if($datosAlumno!=null){
                                            echo '<table class="table table-striped .table-striped">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Apellido</th>
                                                <th scope="col">Apellido</th>
                                                <th scope="col">Teléfono</th>
                                                <th scope="col">Email</th>
                                              </tr>';

                                              foreach ($datosAlumno as $nlinea => $valor) {
                                                echo '
                                                <tr><td scope="row">'.$nlinea.'</td>
                                                    <td> '.$valor->nombre.'</td>
                                                    <td>' . $valor->apellido1. '</td>
                                                    <td>' . $valor->apellido2. '</td>
                                                    <td>' . $valor->movil. '</td>
                                                    <td>' . $valor->email. '</td></tr>';
                                            }
                                          echo '</thead>
                                            <tbody>
                                            </tbody>
                                          </table>';
                          }
                ?>
                <!--------------------------------------ENSEÑA LOS TEMAS QUE EXISTEN dentro del curso seleccionado---------------------->
                <?PHP
                          if($datosCurso!=null){
                                  //var_dump($datosCurso[0]->nombreCurso);die;
                                  
                                  echo '<h2>Curso de '.$nombre_curso.'</h2>
                                  
                                  <table class="table table-striped .table-striped">
                                                  <thead>
                                                    <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col" align="left">Nombre</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th scope="col" >Examen</th>
                                                  </thead>
                                  ';

                                  foreach ($datosCurso as $nlinea => $valor) {
                                    echo '
                                    <tr>
                                      <td scope="row">'.$nlinea.'</td>
                                      <td  align="left"> '.$valor->nombre.'<td>
                                      <td align="left"><a href='.site_url('menuProfesor/ver_tema?id_tema='.$valor->id_tema.'').'>&nbsp &nbspVer</a></td>
                                      <td align="left"><a href='.site_url('menuProfesor/editar_tema?id_tema='.$valor->id_tema.'').'>&nbsp &nbspEditar</a></td>';

                                        //------------------------ENSEÑA LA LLAVE DEL EXAMEN SI EXISTE------------------------
                                      if($valor->id_examen!=null){
// <a id="borrar" href="" onclick=confirmacionBorrar("menuProfesor/borrar_examen?id_examen='.$valor->id_curso.'");>&nbspBorra</a>
//<a id="borrado" href="'.site_url('menuProfesor/borrar_examen?id_examen='.$valor->id_examen.'').'">&nbspBorra</a>
                                      echo ' 
                                      <td align="left"><a href="'.site_url('menuProfesor/borrarTema?id_tema='.$valor->id_tema.'&id_examen='.$valor->id_examen.'').'">&nbsp &nbspBorrar</a></td>
                                      <td ><a href='.site_url('menuProfesor/ver_examen?id_examen='.$valor->id_examen.'&nombre='.$valor->nombre.'').'>
                                            <img src="'.base_url('img/llaveAzul-40.png').'" alt="add" width="30" height="30">Examen</></a>
                                            <button id="borrar" onclick=confirmacionBorrar("menuProfesor/borrar_examen?id_examen='.$valor->id_curso.'");>&nbspBorra</button>
                                     
                                      </td>';
                                      }else{
                                        
                                        echo '
                                        <td align="left"><a href="'.site_url('menuProfesor/borrarTema?id_tema='.$valor->id_tema.'').'">&nbsp &nbspBorrar</a></td>
                                        <td></td>
                                        <td></td>';
                                      }
                                    echo '
                                    </tr>';
                                  }
                                    echo'
                                        <tbody>
                                        </tbody>
                                  </table>
                                  <!-------------------------------------AÑADIR TEMA---------------------->     
                                  <div id="cajaAddTema">
                                            <form class="form" class="form " method="POST" action="'.site_url('menuProfesor/addTema').'">

                                                  <input id="prodId" name="inputCurso" type="hidden" value='.$id_curso.'>                                                  
                                                  <h5> Introduce el nombre del nuevo tema :</h5>
                                                      <input type="text" class="form-control" name="inputInsertTema" placeholder="Nombre del tema">
                                                  
                                                  <button class="btn btn-lg btn-primary btn-block" type="submit" ><img src="'.base_url('img/add40.png').'" alt="add" width="30" height="30"> Tema nuevo</button>

                                            </form>
                                      </div>'; 
                                 //--------------------------------------AÑADIR EXAMEN PORQUE EXISTE TEMA--------------------------------------     
                                echo'
                              
                                <div id="cajaExamen">';
                                                  
                                    if($datosCurso!=null){
                                       echo'             
                                        <form class="form" class="form " method="POST" action="'.site_url('menuProfesor/crear_examen').'"> 
                                                    <h5>AÑADE UN EXAMEN</h5>
                                                    <label  >Selecciona a qué tema vas a añadir el examen : </label>
                                            <div class="dropdown" id="dropDowntemas">';
                                    echo'<select class="custom-select" name="id_tema">';
                                    foreach ($datosCurso as $nlinea => $valor) {
                                      if($valor->id_examen==null){
                                                                  //var_dump($valor->nombre);die;
                                     echo '<option class="dropdown-item" value="' .$valor->id_tema.'">'.$valor->nombre.'</option>';
                                      }
                                    }
                                                          echo' </select>';
                                    }else{
                                                          echo' <button class="btn btn-secondary dropdown-toggle disabled" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-disabled="true">
                                                                      No existen Cursos
                                                                </button>';                       
                                    }
                                    echo '
                                            </div>
                                                  
                                                  <label  >¿Qué tiempo límite tendrá ?</label><br>
                                                  <label id="tiempo"> Hora:</label>
                                                  <input type="number" min="1" max="7" name="tiempo_hora" value="1" require>  

                                                  <label  id="tiempo">Minutos:</label>
                                                  <input type="number" min="00" max="45" name="tiempo_minutos" value="00" step="15" require> 
                                                  <br> 
                                                  <label  >No tiene tiempo límite</label>&nbsp
                                                  <input type="checkbox" id="cbox1" name="noTiempo" value="si"> 
                                                  <br>
                                                  <label  >Nota mínima para aprobar : </label>
                                                  <input type="number" min="1" max="10" name="notaMinima" value="5" require>
                                                  <br>
                                                  <label  >Nota máxima del examen : </label>
                                                  <input type="number" min="1" max="10" name="notaMaxima" value="10" require>  
                                                  <br>
                                                  <label>Número de preguntas : </label>
                                                  <input type="number" min="2" max="10" name="nPreguntas" value="2" require> 

                                              <button class="btn btn-lg btn-primary btn-block" type="submit" ><img src="'.base_url('img/add40.png').'" alt="add" width="30" height="30"> Añadir examen</button>
                                              
                                        </form>
                                
                                </div>';
                          }else{
                            //--------------------------------------NO HAY TEMAS, INSERTA UNO--------------------------------------
                            if($id_curso!=null){
                                    echo '<h2>Curso '.$nombre_curso.'</h2>
                                    <div id="cajaAddTema">
                                          <form class="form" class="form " method="POST" action="'.site_url('menuProfesor/addTema').'"> 
                                                  <input id="prodId" name="inputCurso" type="hidden" value="'.$id_curso.'">
                                                
                                                  
                                                  <h5 align="left"> Introduce el nombre del nuevo tema : </h5>
                                                      <input type="text" class="form-control" name="inputInsertTema" placeholder="Nombre del tema">
                                                  <button class="btn btn-lg btn-primary btn-block" type="submit" ><img src="'.base_url('img/add40.png').'" alt="add" width="30" height="30"> Tema nuevo</button>
                                          </form>
                                    </div>';
                            }

                          }
                    ?>
                    
                     <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>


        </div>
        
</div>

