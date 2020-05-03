
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
                            <input type="text" class="form-control" name="inputInsertCurso" placeholder="Nombre del curso">
                            <h3 class="h3 mb-3 font-weight-normal">Introduce el nombre del tema :</h3>
                            <input type="text" class="form-control" name="inputInsertTema" placeholder="Nombre del primer tema ">
                              <p> <input type="submit" value="Crear"></p>
                            </form>
                          </div>

                          
                          <div id="tabs-2">
                              <form class="form" class="form " method='POST' action="<?php echo site_url('menuProfesor/ver_curso'); ?>">
                                    <h3 class="h3 mb-3 font-weight-normal">Elige el curso a editar:</h3>
                                          <div class="dropdown">
                                            
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
                      <div style="width:50%">
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
                                                <tr><td scope="row">'.$nlinea.'</td><td> '.$valor->nombre.'</td><td>' . $valor->apellido1. '</td><td>' . $valor->apellido2. '</td><td>' . $valor->movil. '</td><td>' . $valor->email. '</td></tr>';
                                            }
                                          echo '</thead>
                                            <tbody>
                                            </tbody>
                                          </table>';
                          }
                          if($datosCurso!=null){
                                  //var_dump($datosCurso[0]->nombreCurso);die;
                                  
                                  echo '<h2>Curso de '.$datosCurso[0]->nombreCurso.'</h2>
                                  
                                  <table class="table table-striped .table-striped">
                                                  <thead>
                                                    <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col"></th>
                                  ';
                                  foreach ($datosCurso as $nlinea => $valor) {
                                    echo '
                                    <tr>
                                      <td scope="row">'.$nlinea.'</td>
                                      <td  align="left"> '.$valor->nombreTema.'<a href='.site_url('menuProfesor/ver_tema?id_tema='.$valor->id_tema.'').'>&nbsp &nbspVer</a><a href='.site_url('menuProfesor/editar_tema?id_tema='.$valor->id_tema.'').'>&nbsp &nbspEditar</a><a href="'.site_url('menuProfesor/borrarTema?id_tema='.$valor->id_tema.'').'">&nbsp &nbspBorrar</a></td>
                                      
                                      <td ><a href='.site_url('menuProfesor/editar_tema?id_tema='.$valor->id_tema.'').'><img src="'.base_url('img/llaveAzul-40.png').'" alt="add" width="30" height="30">Examen</></td >
                                    </tr>';
                                    }
                                  echo '</thead>
                                        <tbody>
                                        </tbody>
                                      </table>
                                      <div id="cajaAddTema">
                                            <form class="form" class="form " method="POST" action="'.site_url('menuProfesor/addTema').'">
                                                      
                                                  <input id="prodId" name="inputCurso" type="hidden" value="'.$datosCurso[0]->id_curso.'">

                                                  
                                                  <h5> Introduce el nombre del nuevo tema :</h5>
                                                      <input type="text" class="form-control" name="inputInsertTema" placeholder="Nombre del tema">
                                                  
                                                  
                                                  <button class="btn btn-lg btn-primary btn-block" type="submit" ><img src="'.base_url('img/add40.png').'" alt="add" width="30" height="30"> Tema nuevo</button>


                                            </form>
                                      </div> 


                                <div id="cajaExamen">
                                        <form class="form" class="form " method="POST" action="'.site_url('menuProfesor/crear_examen').'"> 
                                                  <h5>AÑADE UN EXAMEN</h5>
                                                  <label  >Selecciona a qué tema vas a añadir el examen : </label>
                                            <div class="dropdown" id="dropDowntemas">';
                                                  if($datosCurso!=null){
                                                          echo'<select class="custom-select" name="id_tema">';
                                                              foreach ($datosCurso as $nlinea => $valor) {
                                                                  //var_dump($valor->nombre);die;
                                                                  echo '<option class="dropdown-item" value="' .$valor->id_tema.'">'.$valor->nombreTema.'</option>';
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
                                                      <div class="dropdown" >
                                                          <select class="custom-select" name="tiempo_hora">
                                                            <option class="dropdown-item" value="1">1</option>
                                                            <option class="dropdown-item" value="2">2</option>
                                                            <option class="dropdown-item" value="3">3</option>
                                                            <option class="dropdown-item" value="4">4</option>
                                                            <option class="dropdown-item" value="5">5</option>
                                                            <option class="dropdown-item" value="6">6</option>
                                                            <option class="dropdown-item" value="7">7</option>
                                                          </select>
                                                      </div>
                                                  <label  id="tiempo">Minutos:</label>
                                                      <div class="dropdown">
                                                              <select class="custom-select" name="tiempo_minutos">
                                                                  <option class="dropdown-item" value="1">00</option>
                                                                  <option class="dropdown-item" value="2">15</option>
                                                                  <option class="dropdown-item" value="3">30</option>
                                                                  <option class="dropdown-item" value="4">45</option>
                                                              </select>
                                                      </div>
                                                          <label  >No tiene tiempo límite</label>&nbsp
                                                          <input type="checkbox" id="cbox1" name="noTiempo" value="si"> 
                                                          <br>
                                                          <label  >Nota mínima para aprobar : </label>
                                                          <input type="number" min="5" max="10" name="nota" value="5" require>  

                                                          <button class="btn btn-lg btn-primary btn-block" type="submit" ><img src="'.base_url('img/add40.png').'" alt="add" width="30" height="30"> Añadir examen</button>
                                              
                                        </form>
                                
                                </div>';
                          }else{
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
                     <div id="cajaExamen">
                                        <form class="form" class="form " method="POST" action="'.site_url('menuProfesor/crear_examen').'"> 
                                                  <h5>AÑADE UN EXAMEN</h5>
                                                  <label  >Selecciona a qué tema vas a añadir el examen : </label>
                                            <div class="dropdown" id="dropDowntemas">
                                                  <?php if($datosCurso!=null){
                                                          echo'<select class="custom-select" name="id_tema">';
                                                              foreach ($datosCurso as $nlinea => $valor) {
                                                                  //var_dump($valor->nombre);die;
                                                                  echo '<option class="dropdown-item" value="' .$valor->id_tema.'">'.$valor->nombreTema.'</option>';
                                                              }
                                                          echo' </select>';
                                                  }else{
                                                          echo' <button class="btn btn-secondary dropdown-toggle disabled" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-disabled="true">
                                                                      No existen Cursos
                                                                </button>';                       
                                                  }
                                                          ?>
                                            </div>
                                                  
                                                  <label  >¿Qué tiempo límite tendrá ?</label><br>
                                                  <label id="tiempo"> Hora:</label>
                                                      <div class="dropdown" >
                                                          <select class="custom-select" name="tiempo_hora">
                                                            <option class="dropdown-item" value="1">1</option>
                                                            <option class="dropdown-item" value="2">2</option>
                                                            <option class="dropdown-item" value="3">3</option>
                                                            <option class="dropdown-item" value="4">4</option>
                                                            <option class="dropdown-item" value="5">5</option>
                                                            <option class="dropdown-item" value="6">6</option>
                                                            <option class="dropdown-item" value="7">7</option>
                                                          </select>
                                                      </div>
                                                  <label  id="tiempo">Minutos:</label>
                                                      <div class="dropdown">
                                                              <select class="custom-select" name="tiempo_minutos">
                                                                  <option class="dropdown-item" value="1">00</option>
                                                                  <option class="dropdown-item" value="2">15</option>
                                                                  <option class="dropdown-item" value="3">30</option>
                                                                  <option class="dropdown-item" value="4">45</option>
                                                              </select>
                                                      </div>
                                                          <label  >No tiene tiempo límite</label>&nbsp
                                                          <input type="checkbox" id="cbox1" name="noTiempo" value="si"> 
                                                          <br>
                                                          <label  >Nota mínima para aprobar : </label>
                                                          <input type="number" min="0" max="10" name="nota" value="1" require>
                                                          <br>
                                                          <label  >Nota máxima del examen : </label>
                                                          <input type="number" min="0" max="10" name="nota" value="1" require>
                                                          <br>
                                                          <label  >¿cuántas preguntas tendrá el examen? </label>
                                                          <input type="number" min="2" max="50" name="nota" value="2" require>

                                                          <button class="btn btn-lg btn-primary btn-block" type="submit" ><img src="'.base_url('img/add40.png').'" alt="add" width="30" height="30"> Añadir examen</button>
                                              
                                        </form>
                                
                                </div>';
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>


        </div>
        
</div>
<!----
        <div id="historial">
          <h3>Historial</h3>
        <table class="table" style="width:100%">
            <tr>
              <th>Fecha/HORA</th>
              <th>tipo</th>
              <th>ubicación</th>
              <th>Tiempo</th>
            </tr>
            <tr><!-?php/*
          if($interpreteDatos==null){
            echo '<th>No hay citas</th>
                  </tr>';
        }else{
          if(isset( $historial)){

          
            foreach($historial as $Nlineas ){
                 //var_dump($historial);die;
              echo '<tr>
              <input type="hidden" value="'.$Nlineas['id_citas'].'"  name="id_cita">
              
                    <td>'.$Nlineas['dia'].'  -  '.$Nlineas['hora_inicio'].'</td>
                    <td>'.$Nlineas['centro'].'</td>
                    <td>'.$Nlineas['especialidad'].'</td>
                    <td>'.$Nlineas['total'].'</td>';
                    
                  if($Nlineas['dia'] > date('Y-m-d')){
                    echo '<td><a href="'. base_url('index.php/MenuInterprete/llamada?id_cita='.$Nlineas['id_citas'].'').'">llamar</a></td>';
                  }

                  '</tr>';
                 
                            }
                          }else{
                            echo '<td>No hay citas</t>';
                          }
      }
          
          */?>

        </div>
          
    </div>
