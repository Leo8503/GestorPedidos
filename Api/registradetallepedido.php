<?php
    include("conectardb.php");
    //valores a ingresar
    $id = $_POST['id'];
    $foto = $_POST['foto'];
    $precio = $_POST['precio'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $subtotal = $_POST['subtotal'];
    $categoria = $_POST['categoria'];
    $fkcategoria = $_POST['fkcategoria'];
    $fkpedido = $_POST['fkpedido'];

    date_default_timezone_set('America/Mexico_City');
    $now = date('Y-m-d H:i:s');

    $dataArray = array();
    //funtion conectar de conectardb.php
    $conexion = conectar();
    $sentencia = $conexion->prepare("INSERT INTO plato_pedido(subtotal, cantidad, categoria, fkpedido,  plato , precio , foto) VALUES( ?, ?, ? ,? ,? ,? ,?)");
    $sentencia->bind_param("sssssss",$subtotal, $cantidad, $categoria, $fkpedido, $producto, $precio, $foto);
    $result = $sentencia->execute();
    if($result){
        $arrayDatos["insertado"]="1";
    }else{
      	$arrayDatos["insertado"]="0";
    }
    $dataArray[] = $arrayDatos;
    echo json_encode($dataArray);
    $conexion = null;
    ?>
