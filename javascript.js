 var producto = document.getElementById("producto");
 var select = document.getElementById('clasificacion');
 select.addEventListener('change',
  function(){
    var selectedOption = this.options[select.selectedIndex];
    console.log(selectedOption.value + ': ' + selectedOption.text);
  });
  var comentarios = document.getElementById("comentarios");
  var marketing_foto = document.getElementById("marketing_foto");
  var producto_foto = document.getElementById("producto_foto");


 
  function validacion(inputID, mensajeID, mensajeTexto){
    var inputElement = document.getElementById(inputID);
   if(inputElement.value == ""){
    document.getElementById(mensajeID).innerHTML = mensajeTexto;
   }else{
    document.getElementById(mensajeID).innerHTML = "";
   }

  }



/*
  function validacion(){
    console.log("validando");

    var producto = document.getElementById("producto");
    var comentarios = document.getElementById("comentarios");
    var marketing_foto = document.getElementById("marketing_foto");
    var producto_foto = document.getElementById("producto_foto");

    console.log(marketing_foto.value);

   if(producto.value == ""){
    document.getElementById("mensajeproducto").innerHTML = "Es necesario incluir el nombre del producto";
   }
   if(comentarios.value == ""){
    document.getElementById("mensajecomentarios").innerHTML = "Es necesario añadir comentarios";
   }
   if(marketing_foto.value == ""){
    document.getElementById("mensajemarketing").innerHTML = "Se necesita incluir una foto de marketing del producto";
   }
   if(producto_foto.value == ""){
    document.getElementById("mensajeproductos").innerHTML = "Se necesita incluir una foto real del producto";
   }

  }*/