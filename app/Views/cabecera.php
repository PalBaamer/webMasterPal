<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>webMasterPal</title>
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="<?php echo base_url('css/navbar-top-fixed.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/estilos.css') ?>" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
  </script>
  <script src="<?php base_url("js/funciones.js")?>">
  </script>

    <!-- Custom styles for this template -->
  </head>
<script>
</script>

<body class="text-center">
  <header>
  </header>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">


      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
          <a class="navbar-brand" href="<?php echo site_url('home/index'); ?>">
            <img class="mb-4" src="<?php echo base_url('img/color.png') ?>" alt="Icono de Inicio" width="72" height="72">
          </a>  
          </li>
          <li class="nav-item">
    <!--?php
        switch ($sesionUsuario){
          case 0:
          echo '<a class="navbar-brand" href="'.base_url().'index.php/MenuAdmin">Inicio</a>  
                  <li class="nav-item">
                    <a class="nav-link" href="'.base_url().'index.php/MenuAdmin/buscarInterprete?id_interprete='.$id.'&sesionUsuario='.$sesionUsuario.'">Mi perfil</a>
                  </li>';
          break;
        
          case 1:
          echo '<a class="navbar-brand" href="'.base_url().'index.php/MenuInterprete">Inicio</a>  
                  <li class="nav-item">
                  <a class="nav-link" href="'.base_url().'index.php/MenuAdmin/buscarInterprete?id_interprete='.$id.'&sesionUsuario='.$sesionUsuario.'">Mi perfil</a>
                  </li>';
          break;
          case -1:
          default:
          echo '<a class="navbar-brand" href="'. base_url().'index.php/MenuUsuario">Inicio</a>  
                  <li class="nav-item">
                  <a class="nav-link" href="'.base_url().'index.php/MenuAdmin/buscarUsuario?id_usuario='.$id.'&sesionUsuario='.$sesionUsuario.'">Mi perfil</a>
                  </li>';
          break;

        }
      ?-->
        </li>
          <!--li class="nav-item">
            <a class="nav-link" href="<--?php echo site_url('home/cerrarSesion'); ?>">Cerrar Sesión</a>
          </li-->
          <li>
          <a class="navbar-brand" href="<?php echo site_url('home/cerrarSesion'); ?>">
            <img class="mb-4" src="<?php echo base_url('img/apagar.png') ?>" alt="Icono de Inicio" width="72" height="72">
          </a>  
          </li>
        </ul>
      </div>
    </nav>
    <main role="main" class="container">
   
    
