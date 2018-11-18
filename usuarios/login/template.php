<?php
if (!isset($_SESSION)) {
  session_start();
}
?>

<div class="container fondooscuro" >
<h1>Accede con tu Usuario</h1>
  <form action="#" method="POST"> 
   <div class="row">
     <div class="col-2">
        
     </div>
     <div class="col-2">
        <div class="container" style="margin-bottom:100px; padding-top:30px">
        <img src="/imagenes/acceso.svg" class="img-fluid" alt="Responsive image" width="200px" height="200px">
        </div>
     </div>
     <div class="col-4">
        <div class="form-group">
          <label for="usuario">Usuario</label>
          <input type="text" class="form-control" id="usuario" placeholder="usuario" name="usuario">
        </div>
        <div class="form-group">
          <label for="contrasena">Contraseña</label>
          <input type="password" class="form-control" id="contrasena" placeholder="Contraseña" name="contrasena">
        </div>
        
        <button type="submit" class="btn btn-primary" name="enviar">Entrar</button>
      </div>
    </div>
  </form>
</div>