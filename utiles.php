 
<?php
      for($n=0; $n<count($mensajes); $n++){
        $mensaje = $mensajes[$n];

        echo "
        <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
  $mensaje<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>";
      }

      for($n=0; $n<count($errores); $n++){
        $mensaje = $errores[$n];

        echo "
        <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
  $mensaje<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>";
      }
    ?>