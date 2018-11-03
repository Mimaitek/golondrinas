<?php if (!isset($_SESSION)) {
  session_start();
}
?>
<div class="fondo-productos">
<?php echo "<h1>¿Quieres subir tus productos?</h1>"?>
    <div class="container-productos">
        <form action="#" method="POST">
        <div class="row">
            <div class="col-5">
            <div class="form-group">
                 <label for="texto">¿No puedes acceder?¡Regístrate!</label><br><a href="http://localhost/registro/" target="_blank"><button class="btn btn-primary" name="enviar">Registro</button></a> 
                 <hr>
                 <label for="texto">¿Quieres subir productos?Accede!</label><br><a href="https//localhost/login/" target="_blank"><button class="btn btn-primary" name="enviar">Accede</button></a>
             </div>
             </div>    
            <div class="col-7">
            <img src="/prod/crearproducto/compras.png" alt="compras" width="400px" height="300px";/>
             </div>
        </div>
        </form>
        
    </div>
</div>

