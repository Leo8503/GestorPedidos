<?php
   include("conectardb.php");
   $conexion = conectar();
   $sql = "SELECT * FROM configuracion";

   mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
   if(!$result = mysqli_query($conexion, $sql)) die();
   $configuracion = array(); //creamos un array
   while($row = mysqli_fetch_array($result))
   {
         $id=$row['id'];
         $logo=$row['logo'];
         $imgApp=$row['imgApp'];
         $tipo=$row['tipo'];
         $soporte=$row['whattsapp_soporte'];
         $colorApp=$row['colorApp'];
         $banner1=$row['banner1'];
         $banner2=$row['banner2'];
         $banner3=$row['banner3'];
         $negocio=$row['negocio'];
         $direccion=$row['direccion'];
         $correo=$row['correo'];
         $telefono=$row['telefono'];
         $latitud=$row['latitud'];
         $longitud=$row['longitud'];

         $configuracion[] = array(
          'id'=> $id, 'logo'=> $logo, 'imgApp'=> $imgApp,
          'tipo'=> $tipo, 'soporte'=> $soporte, 'color'=> $colorApp,
          'banner1'=> $banner1, 'banner2'=> $banner2, 'banner3'=> $banner3,
          'negocio'=> $negocio, 'direccion'=> $direccion, 'correo'=> $correo,
          'telefono'=> $telefono, 'latitud'=> $latitud, 'longitud'=> $longitud
       );
   }

   $close = mysqli_close($conexion)
   or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
   $json_string = json_encode($configuracion);
   echo $json_string;
?>
