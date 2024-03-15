<?php
   include("conectardb.php");
   $conexion = conectar();
   $id = $_POST['id'];

   $sql = "SELECT * FROM plato_pedido WHERE fkpedido = '{$id}'";
   mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
   if(!$result = mysqli_query($conexion, $sql)) die();
   $platos = array(); //creamos un array
   while($row = mysqli_fetch_array($result))
   {
         $id=$row['ID'];
         $subtotal=$row['subtotal'];
         $cantidad=$row['cantidad'];
         $categoria=$row['categoria'];
         $fkpedido=$row['fkpedido'];
         $plato=$row['plato'];
         $foto=$row['foto'];
         $precio=$row['precio'];


         $platos[] = array('id'=> $id, 'subtotal'=> $subtotal, 'cantidad'=> $cantidad,
                           'categoria'=> $categoria, 'fkpedido'=> $fkpedido,
                            'plato'=> $plato, 'foto'=> $foto, 'precio'=> $precio
                         );
   }

   $close = mysqli_close($conexion)
   or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
   $json_string = json_encode($platos);
   echo $json_string;
?>
