<?php
  require "../../class/db/clsController.php";
  $obj_cnsc = new clsCnsc();
  if ($obj_cnsc->EditarApoderado($_POST["id"],$_POST["iduser"],$_POST["identificacion"],$_POST["nombre"],
  $_POST["apellido"],$_POST["correo"],
  $_POST["telefono"])) {
    echo "err:ok";
  }
?>
