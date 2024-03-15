<?php
  require "../../class/db/clsController.php";
  $obj_cnsc = new clsCnsc();
  if ($obj_cnsc->CrearPlato($_POST["nombre"],$_POST["descripcion"],
  $_POST["precio"],$_POST["categoria"],$_POST["estado"], $_POST["inputNArchivo"] )) {
    echo "err:ok";
  }
?>
