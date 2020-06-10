<!doctype html>
<html lang="es">
  <head>
    
  <title>WebMaster</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url('css/alumno.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!--link rel="stylesheet" href="/resources/demos/style.css"-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   
        <script type="text/javascript">	
            function ActivarCampoOtroTema(id){		
                    var contenedor = document.getElementById("clave_"+id);	
                    console.log(contenedor);	
                    contenedor.style.display = "block";		
                return true;	
            }
        </script>

        <script>
                function error() {
                    <?php 
                if($error!=null){
                
                       echo' window.alert("'.$error.'");';
                        $error=null;
                    }?>
                    
                    }
                
        </script>
        <script>
                function sinCursos(alerta){
                    window.alert(alerta);
                }
        </script>
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>





    </head>

    <body onload="error()";>
    <header>
        <a class="inicioImg" href="<?php echo site_url('home/index'); ?>">
                      <img src="<?php echo base_url('img/color.png') ?>" alt="Icono de Inicio" width="72" height="72">
        </a> 
        <label>MASTER</label> 
        <a class="apagar" href="<?php echo site_url('home/cerrarSesion'); ?>">
                      <img src="<?php echo base_url('img/apagar.png') ?>" alt="Icono de Inicio" width="72" height="72">
        </a> 
    </header>
    <nav>
        <ul>
            <a href="<?php echo site_url('menuAlumno/index');?>">Novedades</a>
            <a href="<?php echo site_url('menuAlumno/misCursos');?>">Mis cursos</a>
            <a href="#tabs-3"> Notas</a>
        </ul>
    </nav>
    
    

