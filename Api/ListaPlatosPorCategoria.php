<?php
   include("conectardb.php");
   $conexion = conectar();

   $id = $_POST['id'];
   $sql = "SELECT p.ID, p.nombre, p.precio, p.descripcion, p.foto, p.estado, c.nombre AS categoria, p.fkcategoria FROM plato AS p INNER JOIN categoria AS c ON p.fkcategoria = c.ID WHERE  p.fkcategoria = '{$id}'";

   mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
   if(!$result = mysqli_query($conexion, $sql)) die();
   $platos = array(); //creamos un array
   while($row = mysqli_fetch_array($result))
   {
         $id=$row['ID'];
         $nombre=$row['nombre'];
         $precio=$row['precio'];
         $descripcion=$row['descripcion'];
         $foto=$row['foto'];
         $estado=$row['estado'];
         $categoria=$row['categoria'];
         $fkcategoria=$row['fkcategoria'];

         $platos[] = array('id'=> $id, 'nombre'=> $nombre, 'precio'=> $precio,
                           'descripcion'=> $descripcion, 'foto'=> $foto,
                           'estado'=> $estado, 'categoria'=> $categoria, 'fkcategoria'=> $fkcategoria);
   }

   $close = mysqli_close($conexion)
   or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
   $json_string = json_encode($platos);
   echo $json_string;
?>
