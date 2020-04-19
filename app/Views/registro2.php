


  <br>
<br>
<br>
<div id="formAlta"  class="form d-flex p-2 justify-content-center" style="max-width: 50%;">

  <form id="" class="form " method='POST' action="<?php echo site_url('loginProfesor/registroUsuario'); ?>">
<h1 class="h3 mb-3 font-weight-normal">Inserte sus datos <p> Soy un :             
<select class="custom-select" name="inputCategoria">
            
            <option class="dropdown-item" selected value="0" >Alumno</option>
            <option class="dropdown-item" value="1"  >Profesor</option>
            <!--option class="dropdown-item" value="0" >NO</option-->          
        
    </select>
    </p> 
    </h1>
      
      <label for="inputNombre" class="sr-only">NOMBRE</label>
      <input type="text" class="form-control" name="inputNombre" placeholder="Nombre" >
    
      <label for="inputApellido" class="sr-only">APELLIDO </label>
  <input type="text" class="form-control" name="inputApellido" placeholder="Apellido" >
  
  <label for="inputApellido2" class="sr-only">APELLIDO2 </label>
    <input type="text" class="form-control" name="inputApellido2" placeholder="Apellido2" >

    <label for="inputDni" class="sr-only">DNI </label>
    <input type="text" class="form-control" name="inputDni" placeholder="DNI" maxlength="9" >

    <label for="inputDireccion" class="sr-only">DIRECCION </label>
    <input type="text" class="form-control" name="inputDireccion" placeholder="Direccion">

    <label for="inputProvincia" class="sr-only">PROVINCIA </label>
    <select class="custom-select" name="inputProvincia">
            <?php 
    
            foreach ($listaProvincia as $nlinea => $valor) {
    
                echo '<option class="dropdown-item" value="' . $valor->id_provincia .'">' . $valor->nombre . '</option>';
            }
            ?>
            </select>

    <label for="inputTelefono" class="sr-only">TELÉFONO </label>
    <input type="text" class="form-control" minlength="8" maxlength="9" name="inputTelefono" placeholder="Telefono" >
    
    <label for="inputEmail" class="sr-only">EMAIL </label>
    <input type="email" class="form-control" name="inputEmail" placeholder="Email" required >
    <label for="inputContrasena" class="sr-only">CONTRASEÑA </label>
    <input type="password" class="form-control" minlength="8" name="inputContrasena" placeholder="Contrasena" >

    <button class="btn btn-lg btn-primary btn-block" id="ocultar" type="submit" >Continuar</button>
</form>
    
