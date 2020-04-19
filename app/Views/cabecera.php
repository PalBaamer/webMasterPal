<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>webMasterPal</title>
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
    <link href="<?php echo site_url('../css/navbar-top-fixed.css') ?>" rel="stylesheet">
    <link href="<?php echo site_url('../css/estilosFuncional.css') ?>" rel="stylesheet">

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    


  
  </script>
  <script src="<?php base_url("js/funciones.js")?>">
  </script>


  <script>
  
  </script>


   <script>
  <?php 
  
    if($error!=null){
    
        echo 'function error() {
          window.alert("'.$error.'");
        }';
      }
    ?>
 </script>

    <!-- Custom styles for this template -->
  </head>

<body class="text-center" onload="error()">
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
              </li>
              <li>
                  <a class="navbar-brand" href="<?php echo site_url('home/cerrarSesion'); ?>">
                    <img class="mb-4" src="<?php echo base_url('img/apagar.png') ?>" alt="Icono de Inicio" width="72" height="72">
                  </a>  
              </li>
        </ul>
      </div>
    </nav>
    <main role="main" class="container">
   
    
