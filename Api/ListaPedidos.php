<?php
   include("conectardb.php");
   $conexion = conectar();

   $id  = $_POST['id'];


   $sql = "SELECT * FROM pedido";
   mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
   if(!$result = mysqli_query($conexion, $sql)) die();
   $platos = array(); //creamos un array
   while($row = mysqli_fetch_array($result))
   {
         $id=$row['ID'];
         $total=$row['total'];
         $subtotal=$row['subtotal'];
         $direccion=$row['direccion'];
         $telefono=$row['telefono'];
         $fecha=$row['fecha'];
         $estado=$row['estado'];

         $platos[] = array('id'=> $id, 'total'=> $total, 'subtotal'=> $subtotal,
                           'direccion'=> $direccion, 'telefono'=> $telefono
                           ,'fecha'=> $fecha
,'estado'=> $estado
                         );
   }

   $close = mysqli_close($conexion)
   or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
   $json_string = json_encode($platos);
   echo $json_string;
?>
