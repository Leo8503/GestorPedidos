<?php
    include("conectardb.php");
    //valores a ingresar
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $sexo = $_POST['sexo'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $estado = "activo";
    $cliente = "Cliente";

    date_default_timezone_set('America/Mexico_City');
    $now = date('Y-m-d H:i:s');
    $dataArray = array();
    //funtion conectar de conectardb.php
    $conexion = conectar();

    $salt = sha1(rand());
    $salt = substr($salt, 0, 10);
    $encrypted = base64_encode(sha1($password . $salt, true) . $salt);

    $sentencia = $conexion->prepare("INSERT INTO usuario(usuario, password, hash, rol) VALUES(?, ?, ? ,?)");
    $sentencia->bind_param("ssss", $usuario, $encrypted, $salt , $cliente);
    $result = $sentencia->execute();


    $consultap = "SELECT MAX(ID) AS id FROM usuario";
    $resulp = $conexion->query($consultap);
    $d = $resulp->fetch_row();
    $maxid=$d[0];

    //inserta los datos
    $sentencia = $conexion->prepare("INSERT INTO cliente(nombre, apellido, correo, telefono, estado, creado, user) VALUES(?,  ? ,?, ?, ?, ?, ?)");
    $sentencia->bind_param("sssssss", $nombre, $apellido, $usuario, $telefono, $estado, $now, $maxid);
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
