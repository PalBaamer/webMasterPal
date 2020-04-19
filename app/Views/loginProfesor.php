
<script>

function hideLogin() {
  var usuario = document.getElementById("formUsuario");
  var interprete = document.getElementById("formInterprete");
  if ($("#formUsuario").hasClass("d-block")) {
    $("#formUsuario").removeClass('d-none');
    $("#formUsuario").addClass('d-block');

    $("#formInterprete").addClass('d-block');
    $("#formInterprete").removeClass('d-none');
  } else {
    $("#formInterprete").removeClass('d-none');
    $("#formInterprete").addClass('d-block');
    
    $("#formUsuario").addClass('d-block');
    $("#formUsuario").removeClass('d-none');
  }
}
</script>
<body >
    <main role="main" class="container">
    </header>
<section class="loginCampo">                             
  <form id="" class="form-signin " method='POST' action="<?php echo site_url('menuProfesor/validar_profesor'); ?>">

      <h1 class="h3 mb-3 font-weight-normal">Inicia Sesión</h1>
      <label for="inputEmail" class="sr-only">Email </label>
      <input type="email" id="inputEmail" class="form-control" name="inputEmail" placeholder="Email"  >
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPassword" class="form-control" minlength="8" name="inputPassword" placeholder="Contraseña" >
      <button class="btn btn-lg btn-primary btn-block" type="submit" >Entrar</button>
     
    </form>
    <a href="<?php echo site_url('loginAlumno/index'); ?>"><button class="btn btn-lg btn-primary btn-block form-signin">Soy alumno</button></a>
</div>
  </body>
</html>
