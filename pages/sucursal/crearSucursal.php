<?php
  require "../../class/db/clsController.php";
  $obj_cnsc = new clsCnsc();
  if ($obj_cnsc->crearSucursal($_POST["nombre"],$_POST["latitud"], $_POST["longitud"],$_POST["telefono"] ,$_POST["direccion"] ,$_POST["inputNArchivo"])) {
    echo "err:ok";
  }
?>
