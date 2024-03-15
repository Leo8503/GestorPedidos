<?php
    include("conectardb.php");
    //valores a ingresar

    $total = $_POST['total'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $idcliente = $_POST['idcliente'];
    

    date_default_timezone_set('America/Mexico_City');
    $now = date('Y-m-d H:i:s');

    $dataArray = array();
    $conexion = conectar();
    $sentencia = $conexion->prepare("INSERT INTO pedido(total, Fecha, subtotal, direccion, telefono, latitud, longitud, fkcliente) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
    $sentencia->bind_param("ssssssss", $total, $now ,$total, $direccion, $telefono, $latitud, $longitud, $idcliente);
    $result = $sentencia->execute();
    if($result){
        $consultap = "SELECT MAX(ID) AS id FROM pedido";
        $resulp = $conexion->query($consultap);
        $disponible = $resulp->fetch_row();
        $arrayDatos["insertado"]=$disponible[0];
    }else{
      	$arrayDatos["insertado"]="0";
    }
    $dataArray[] = $arrayDatos;
    echo json_encode($dataArray);
    $conexion = null;
?>
