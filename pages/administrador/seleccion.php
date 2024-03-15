<?php
  require "../../class/db/clsController.php";
  $obj_cnsc = new clsCnsc();
  $obj_cnsc->SaveRespuesta($_POST["valor0"], $_POST["valor1"],$_POST["valor2"],$_POST["valor3"]);
?>
