<?php
  require "../../class/db/clsController.php";
  $obj_cnsc = new clsCnsc();
  if ($obj_cnsc->crearDomiciliario($_POST["nombre"],$_POST["apellido"],
                                    $_POST["correo"],$_POST["contacto"],
                                    $_POST["tipo"],$_POST["estado"],
                                    $_POST["user"], $_POST["password"],  $_POST["rol"] 
                                    )) {
    echo "err:ok";
  }
?>
