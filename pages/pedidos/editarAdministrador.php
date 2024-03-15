<?php
  require "../../class/db/clsController.php";
  $obj_cnsc = new clsCnsc();
  if ($obj_cnsc->EditarUsuario($_POST["id"],$_POST["iduser"],$_POST["primer_nombre"],$_POST["segundo_nombre"],
  $_POST["direccion"],$_POST["telefono"],$_POST["fechaNac"],
  $_POST["email"],$_POST["password"])) {
    echo "err:ok";
  }
?>
