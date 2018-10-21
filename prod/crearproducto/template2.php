<?php if (!isset($_SESSION)) {
  session_start();
}
?>
<div class="fondo-productos">
<?php echo "<h1>" .$_SESSION["usuario"] . " No puedes subir tus reviews </h1>"?>
    <div class="container-productos">
        <form action="#" method="POST">
        <div class="row">
            <div class="col-8">
            <div class="form-group">
                 <label for="texto">¿No puedes acceder?Cuéntanos y te ayudamos</label>
                 <input type="text" rows="10" cols="20" class="form-control" id="texto" placeholder="Escribe el motivo, sé breve!!  Máximo 50 caracteres" name="texto">
                 
             </div>
                <button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
             </div>

            <div class="col-4">
            <img src="/usuarios/productos/compras.png" alt="compras" width="400px" height="300px";/>
             </div>
        </div>
        </form>
        
    </div>
</div>
<?php 


    if(isset($_POST["enviar"])){
      
   
        $texto = $_POST["texto"];
        $texto2 = str_replace("\n.", "\n..", $texto);
       
        if($texto !=""){
            $para      = 'mariateresaortube@gmail.com';
            $titulo    = 'No puedo acceder a Productos';
            $texto2 = str_replace("\n.", "\n..", $texto);
            $cabeceras = 'From: mariateresaortube@gmail.com' . "\r\n" .
            'Reply-To: mariateresaortube@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            mail($para, $titulo, $texto2, $cabeceras);
            addMensaje("Datos enviados, nos pondremos en contacto contigo");
            return true;
        }else{
            addError("error");
            return false;
            
        }
    }


?>