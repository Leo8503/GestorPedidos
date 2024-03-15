<?php
 require "../../class/db/clsController.php";
 $obj_cnsc = new clsCnsc();
 if ($obj_cnsc->CrearAdmin($_POST["nombre"],$_POST["apellido"],$_POST["direccion"],$_POST["telefono"],$_POST["usuario"],$_POST["password"])) {
   echo "err:ok";
 }
?>
