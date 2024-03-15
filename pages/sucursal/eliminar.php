<?php
  require "../../class/db/clsController.php";
  $obj_cnsc = new clsCnsc();
  $obj_cnsc->EliminarSucursal($_POST['valorCaja1']);
  /*$valor = $_POST["id"];
  echo  $valor;*/
?>
