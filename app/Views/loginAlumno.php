

<body >


<section class="loginCampo">
  <form class="form-signin justify-content-center" action="<?php echo site_url('loginAlumno/validarAlumno'); ?>" method="POST">
      
      <h1 class="h3 mb-3 font-weight-normal">Inicia Sesión</h1>
      <label for="inputEmail" class="sr-only">Email </label>
      <input type="email" id="inputEmail" class="form-control" name="inputEmail" placeholder="Email"  >
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPassword" class="form-control" minlength="8" name="inputPassword" placeholder="Contraseña" >
      <button class="btn btn-lg btn-primary btn-block" type="submit" >Entrar</button>

    
    </form>
    <a href="<?php echo site_url('loginProfesor/index'); ?>"><button class="btn btn-lg btn-primary btn-block form-signin">Soy profesor</button></a></div>

    </section>
