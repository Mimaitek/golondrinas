<?php if (!isset($_SESSION)) {
  session_start();

}
?>
<script>
    window.__campos = {
        producto: false,
        clasificacion: false,
        comentarios: false,
        marketing_foto: false,
        producto_foto: false
    };

    function checkeaBotonSubmit() {
        var valido = window.__campos.producto && window.__campos.clasificacion && window.__campos.comentarios && window.__campos.marketing_foto && window.__campos.producto_foto;

        var boton = document.getElementById('botonenvio');
        if(valido) {
            boton.disabled = false;
            
        } else {
            boton.disabled = true;
        }
        console.log( window.__campos);
    }



</script>
<div class="fondo-productos">
<?php  echo "<h1 style='color: white;'>Bienvenido " .ucfirst($_SESSION["usuario"]) . ", Sube tus propios reviews </h1>"?>
    <div class="container-productos" id="formulario" >
        <div class="row">
            <div class="col-12">
                <form action="#" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="producto">Nombre del producto</label>
                    <input type="text" class="form-control" id="producto" name="producto" aria-describedby="Help" placeholder=""
                     onkeyup="window.__campos.producto = validacion('producto', 'mensajeproducto', 'Es necesario incluir el nombre del producto'); checkeaBotonSubmit();"
                     onblur="window.__campos.producto = validacion('producto', 'mensajeproducto', 'Es necesario incluir el nombre del producto'); checkeaBotonSubmit();">
                    <small id="emailHelp" class="form-text text-muted">Introduce el nombre del producto.</small>
                    <p id="mensajeproducto" class="errorproductos"></p>
                </div>
                <div class="form-group">
                    <label for="clasificacion">Tipo de Producto</label>
                    <select class="form-control" name="clasificacion"  id="clasificacion"
                     onchange="window.__campos.clasificacion = validacion('clasificacion', 'mensajetipo', 'Elija una categoría'); checkeaBotonSubmit();" 
                     onblur="window.__campos.clasificacion = validacion('clasificacion', 'mensajetipo', 'Elija una categoría'); checkeaBotonSubmit();"
                     class="errorproductos">
                    <option value="" disabled selected>Seleccione una Categoría...</option>
                    <option value="tecnologia">Tecnología</option>
                    <option value="servicios">Servicios</option>
                    <option value="alimentacion">Alimentación</option>
                    <option value="ocio">Ocio</option>
                    <option value="deportes">Deportes</option>
                    </select>
                    <p id="mensajetipo" class="errorproductos"></p>
                </div>
                <div class="form-group">
                    <label for="comentarios">Háblanos de él</label>
                    <textarea class="form-control" id="comentarios" name="comentarios" rows="3" 
                    onkeyup="window.__campos.comentarios = validacion('comentarios', 'mensajecomentarios', 'Es necesario incluir una descripción'); checkeaBotonSubmit();"
                    onblur="window.__campos.comentarios = validacion('comentarios', 'mensajecomentarios', 'Es necesario incluir una descripción'); checkeaBotonSubmit();"></textarea>
                    <small id="fileHelp" class="form-text text-muted">Describe y analiza al producto!!!</small>
                    <p id="mensajecomentarios" class="errorproductos"></p>
                </div>
                <div class="form-group">
                    <label for="marketing_foto">Sube imágenes de la campaña de marketing</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="16777215"/>
                    <input type="file" class="form-control-file" id="marketing_foto" name="marketing_foto" aria-describedby="fileHelp" 
                    onkeyup="window.__campos.marketing_foto = validacion('marketing_foto', 'mensajemarketing', 'Es necesario incluir una foto del marketing del producto'); checkeaBotonSubmit();"
                    onblur="window.__campos.marketing_foto = validacion('marketing_foto', 'mensajemarketing', 'Es necesario incluir una foto del marketing del producto'); checkeaBotonSubmit();">
                    <p id="mensajemarketing" class="errorproductos"></p>
                </div>
                <div class="form-group">
                    <label for="producto_foto">Sube imágenes de tu producto</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="16777215" class="required"/>
                    <input type="file" class="form-control-file" id="producto_foto" name="producto_foto" aria-describedby="fileHelp"
                    onkeyup="window.__campos.producto_foto = validacion('producto_foto', 'mensajeproductos', 'Es necesario incluir una foto real del producto'); checkeaBotonSubmit();"
                    onblur="window.__campos.producto_foto = validacion('producto_foto', 'mensajeproductos', 'Es necesario incluir una foto real del producto'); checkeaBotonSubmit();">
                    <p id="mensajeproductos" class="errorproductos"></p>

                </div>
            
            
                <button type="submit" class="btn btn-primary btn-lg" name="enviar" id="botonenvio" disabled>Enviar</button>
                <div id="contenedor_errores"></div>
                </form>
             </div>
          
        </div>
        
    </div>
</div>


