
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
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

    echo '<h1>Bienvenid@ '.$profesorDatos[0]->nombre.'</h1>';
    
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
                          <li><a href="#tabs-3">Buscar Curso</a></li>
                        </ul>
                      <div id="tabs-1">
                        <form class="crearCurso">
                          <p> <input type="submit" value="Crear"></p>
                      </div>
                      </div>
                  </td>
                  <td>
                      <div style="width:50%">
                      <h1>PARTE 2</h1>

                      </div>
                  </td>
              </tr>
        </table>
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
