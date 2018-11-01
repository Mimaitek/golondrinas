<?php if (!isset($_SESSION)) {
  session_start();

}
?>
<div class="fondo-productos">
<?php  echo "<h1>Bienvenido " .ucfirst($_SESSION["usuario"]) . ", Sube tus propios reviews </h1>"?>
    <div class="container-productos" id="formulario">
        <div class="row">
            <div class="col-8">
                <form action="#" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="producto">Nombre del producto</label>
                    <input type="text" class="form-control" id="producto" name="producto" aria-describedby="Help" placeholder=""
                     onkeyup="validacion('producto', 'mensajeproducto', 'Es necesario incluir el nombre del producto')"
                     onblur="validacion('producto', 'mensajeproducto', 'Es necesario incluir el nombre del producto')">
                    <small id="emailHelp" class="form-text text-muted">Introduce el nombre del producto.</small>
                    <p id="mensajeproducto" class="errorproductos"></p>
                </div>
                <div class="form-group">
                    <label for="clasificacion">Tipo de Producto</label>
                    <select class="form-control" name="clasificacion"  id="clasificacion"
                     onchange="validacion('clasificacion', 'mensajetipo', 'Elija una categoría')" 
                     onblur="validacion('clasificacion', 'mensajetipo', 'Elija una categoría')"
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
                    onkeyup="validacion('comentarios', 'mensajecomentarios', 'Es necesario incluir una descripción')"
                    onblur="validacion('comentarios', 'mensajecomentarios', 'Es necesario incluir una descripción')"></textarea>
                    <small id="fileHelp" class="form-text text-muted">Describe y analiza al producto!!!</small>
                    <p id="mensajecomentarios" class="errorproductos"></p>
                </div>
                <div class="form-group">
                    <label for="marketing_foto">Sube imágenes de la campaña de marketing</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="16777215"/>
                    <input type="file" class="form-control-file" id="marketing_foto" name="marketing_foto" aria-describedby="fileHelp" 
                    onkeyup="validacion('marketing_foto', 'mensajemarketing', 'Es necesario incluir una foto del marketing del producto')"
                    onblur="validacion('marketing_foto', 'mensajemarketing', 'Es necesario incluir una foto del marketing del producto')">
                    <p id="mensajemarketing" class="errorproductos"></p>
                </div>
                <div class="form-group">
                    <label for="producto_foto">Sube imágenes de tu producto</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="16777215" class="required"/>
                    <input type="file" class="form-control-file" id="producto_foto" name="producto_foto" aria-describedby="fileHelp"
                    onkeyup="validacion('prodcuto_foto', 'mensajeproductos', 'Es necesario incluir una foto real del producto')"
                    onblur="validacion('prodcuto_foto', 'mensajeproductos', 'Es necesario incluir una foto real del producto')">
                    <p id="mensajeproductos" class="errorproductos"></p>

                </div>
            
            
                <button type="submit" class="btn btn-primary" name="enviar">Submit</button>
                <div id="contenedor_errores"></div>
                </form>
             </div>
            <div class="col-4">
            <img src="/prod/crearproducto/compras.png" alt="compras" width="400px" height="300px";/>
             </div>
        </div>
        
    </div>
</div>


