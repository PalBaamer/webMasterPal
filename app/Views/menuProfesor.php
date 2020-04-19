
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!--link rel="stylesheet" href="/resources/demos/style.css"-->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
</head>
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
                              <li><a href="#tabs-2">Buscar Alumno</a></li>
                              <li><a href="#tabs-3">Editar Curso</a></li>
                            </ul>
                          <div id="tabs-1">
                            <form class="form">
                              <p> <input type="submit" value="Crear"></p>
                            </form>
                          </div>

                          <div id="tabs-2">
                                <form class="form" class="form " method='POST' action="<?php echo site_url('menuProfesor/buscar_alumno'); ?>">
                                <h3 class="h3 mb-3 font-weight-normal">Inserta el nombre alumno</h3>

                                <label for="inputAlumno" class="sr-only">Nombre del alumno</label>
                                  <input type="text" class="form-control" name="inputAlumno" placeholder="Nombre">

                                  <p>  </p><button class="btn btn-lg btn-primary btn-block" type="submit" >Buscar</button>
                                  <p></p>
                              
                                  
                                </form>
                                
                          </div>
                          <div id="tabs-3">
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
                                          echo '<tr><td scope="row">'.$nlinea.'</td><td>' . $valor->nombre. '</td><td>' . $valor->nAlumnos. '</td></tr>';
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
                            
                            echo '<h2>Curso de "'.$datosCurso[0]->nombreCurso.'" y </h2>
                            
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
                                <td  align="left"> '.$valor->nombreTema.'<a href='.site_url('menuProfesor/verTema?id_tema='.$valor->id_tema.'').'>&nbsp &nbspVer</a><a href=#>&nbsp &nbspEditar</a><a href="'.site_url('menuProfesor/borrarTema?id_tema='.$valor->id_tema.'').'">&nbsp &nbspBorrar</a></td>
                                <td align="left">Ex<a href=#>&nbsp &nbspEditar</a></td>
                              </tr>';
                              }
                            echo '</thead>
                                  <tbody>
                                  </tbody>
                                </table>
                                <form class="form" class="form " method="POST" action="'.site_url('menuProfesor/vista_editar_curso').'"> 
                                <input id="id_curso" name="id_curso" type="hidden" value="';
                                echo $id_curso;
                                echo'">
                                <h5 align="left"> Introduce el nombre del nuevo tema :</h5>
                                    <input type="text" class="form-control" name="inputTemaNombre" placeholder="Nombre del tema">
                                
                                
                                <button class="btn btn-lg btn-primary btn-block" type="submit" >imgMas Agrega Nuevo Tema</button>';
                                          
                    }else{
                      if($id_curso!=null){
                              echo '<h2>Curso '.$id_curso;
                              echo' <form class="form" class="form " method="POST" action="'.site_url('menuProfesor/vista_editar_curso').'"> 
                              <input id="id_curso" name="id_curso" type="hidden" value="';
                              echo $id_curso;
                              echo'">
                              <h5 align="left"> Introduce el nombre del nuevo tema :</h5>
                                  <input type="text" class="form-control" name="inputTemaNombre" placeholder="Nombre del tema">
                              
                              
                              <button class="btn btn-lg btn-primary btn-block" type="submit" >imgMas Agrega Nuevo Tema</button>';
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
