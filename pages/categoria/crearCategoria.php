<?php
  require "../../class/db/clsController.php";
  $obj_cnsc = new clsCnsc();
  if ($obj_cnsc->crearCategoria($_POST["categoria"],$_POST["estado"],
  $_POST["inputNArchivo"])) {
    echo "err:ok";
  }
?>
