
<!doctype html>
<html lang="es">
  <head>
    
  <title>WebMaster</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="<?php echo base_url('css/estilosFuncional.css') ?>" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="<?php site_url("js/funciones.js")?>"></script>
  </head>

  <body>
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
    </ul>
    <a href="<?php echo site_url('loginProfesor/index'); ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Iniciar Sesion</a>
    <a href="<?php echo site_url('loginProfesor/registro'); ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Registro</a>
            <!--div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">REGISTRO</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="<//?php echo site_url('home/registro'); ?>">Profesor</a>
                  <a class="dropdown-item" href="<//?php echo site_url('home/registro'); ?>">Alumno</a>
                </div>
            </div-->
      </div>
    </nav>
