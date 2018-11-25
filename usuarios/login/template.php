<?php
if (!isset($_SESSION)) {
  session_start();
}
?>

<div class="container" style="color:white;" >
<h1>Accede con tu Usuario</h1>
  <form action="#" method="POST"> 
   <div class="row">
    
     <div class="col-4">
        <img src="/imagenes/acceso.svg" class="img-fluid" alt="Responsive image" width="150" height="150">
     </div>
     <div class="col-8">
        <div class="form-group">
          <label for="usuario">Usuario</label>
          <input type="text" class="form-control" id="usuario" placeholder="usuario" name="usuario" style="color: black; !important">
        </div>
        <div class="form-group">
          <label for="contrasena">Contraseña</label>
          <input type="password" class="form-control" id="contrasena" placeholder="Contraseña" name="contrasena" style="color: black; !important">
        </div>
        
        <button type="submit" class="btn btn-primary" name="enviar">Entrar</button>
      </div>
    </div>
  </form>
</div>