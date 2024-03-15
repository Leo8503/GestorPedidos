<?php
  require "../../class/db/clsController.php";
  $obj_cnsc = new clsCnsc();
  if ($obj_cnsc->EditarConfiguracion(
  $_POST["tipo"],$_POST["nombre"],$_POST["direccion"],$_POST["correo"],
  $_POST["telefono"],$_POST["latitud"],$_POST["longitud"],
  $_POST["soporte"],$_POST["color"] ,
  $_POST["inputNArchivo"],$_POST["inputNArchivo1"],$_POST["inputNArchivo2"],
  $_POST["inputNArchivo3"], $_POST["inputNArchivo4"]
)) {
    echo "err:ok";
  }
?>
