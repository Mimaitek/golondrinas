

 
  function validacion(inputID, mensajeID, mensajeTexto){
    var inputElement = document.getElementById(inputID);
   if(inputElement.value == ""){
    document.getElementById(mensajeID).innerHTML = mensajeTexto;
    return false;
   }else{
    document.getElementById(mensajeID).innerHTML = "";
    return true;
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

  function muestraError(mensaje){
    Toastify({
      text: mensaje,
      duration: 3000,
      backgroundColor: "linear-gradient(to right, #ff3642, #ff727a)",
      className: "toast-content"
      }).showToast();
  }

  function muestraMensaje(mensaje){
    Toastify({
      text: mensaje,
      duration: 3000,
      backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
      className: "toast-content"
      }).showToast();
  }