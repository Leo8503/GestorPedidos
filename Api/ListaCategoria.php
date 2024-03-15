<?php
   include("conectardb.php");
   $conexion = conectar();

   $sql = "SELECT * FROM categoria";
   mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
   if(!$result = mysqli_query($conexion, $sql)) die();
   $categorias = array(); //creamos un array
   while($row = mysqli_fetch_array($result))
   {
         $id=$row['ID'];
         $categoria=$row['nombre'];
         $foto=$row['foto'];
         $categorias[] = array('id' => $id, 'categoria' => $categoria, 'foto' => $foto);
   }
   $close = mysqli_close($conexion)
   or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
   $json_string = json_encode($categorias);
   echo $json_string;
?>
