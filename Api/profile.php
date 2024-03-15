<?php
include("conectardb.php");
$dataArray = array();
if(isset($_POST['id']) ){
    $id = $_POST['id'];
    $sincr = "1";
    //envia respues en json
    $conexion = conectar();
    $stmt = $conexion->prepare("SELECT id, usuario, contrasena, fkrol, nombre, telefono  FROM usuario WHERE id=? LIMIT 1");
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows == 1) {
        $stmt->bind_result($id, $usuario, $contrasena, $fkrol, $nombre, $telefono);
        if($stmt->fetch()){
            $result = $stmt->get_result();

            $arrayDatos["id"]=$id;
            $arrayDatos["fkrol"]=$fkrol;
            $arrayDatos["usuario"]=$usuario;
            $arrayDatos["nombre"]=$nombre;
            $arrayDatos["telefono"]=$telefono;
        }
    }
    $stmt->close();
    $conexion->close();
}
$dataArray[] = $arrayDatos;
echo json_encode($dataArray);
?>
