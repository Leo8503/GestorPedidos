<?php
  require "../../class/db/clsController.php";
  $obj_cnsc = new clsCnsc();
  $obj_cnsc->LimpiarApoderado($_POST['valorCaja1'],$_POST['valorCaja2']);
  /*$valor = $_POST["id"];
  echo  $valor;*/
?>
