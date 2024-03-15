<?php
include("conectardb.php");
$dataArray = array();
if(isset($_POST['correo']) && isset($_POST['password'])){
    $susername = $_POST['correo'];
    $spassword = $_POST['password'];
    $sincr = "1";
    //envia respues en json
    $conexion = conectar();

    $stmt = $conexion->prepare("SELECT * FROM usuario AS u WHERE u.usuario = ? LIMIT 1");
    $stmt->bind_param('s', $susername);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows == 1) {
      $stmt->bind_result($ID, $usuario ,$password,  $hash, $rol);
      $result = $stmt->get_result();
      if($stmt->fetch()){
        $shhash = base64_encode(sha1($spassword . $hash, true) . $hash);
        if ($password == $shhash) {
          if($rol == 'Cliente'){
            $stmt2 = $conexion->prepare("SELECT c.ID, u.rol, c.foto, c.nombre, c.apellido, c.correo, u.password, u.hash, c.telefono, c.estado FROM usuario AS u INNER JOIN cliente AS c ON c.user = u.ID WHERE u.usuario = ? LIMIT 1");
            $stmt2->bind_param('s', $susername);
            $stmt2->execute();
            $stmt2->bind_result($ID, $rol ,$foto,  $nombre, $apellido, $correo, $password,  $hash, $telefono, $estado);
            if($stmt2->fetch()){
                $result = $stmt2->get_result();
                $hash = base64_encode(sha1($spassword . $hash, true) . $hash);
                if ($password == $hash) {
                  $arrayDatos["resultado"]="1";
                  $arrayDatos["ID"]=$ID;
                  $arrayDatos["rol"]=$rol;
                  $arrayDatos["foto"]=$foto;
                  $arrayDatos["nombre"]=$nombre;
                  $arrayDatos["apellido"]=$apellido;
                  $arrayDatos["correo"]=$correo;
                  $arrayDatos["password"]=$password;
                  $arrayDatos["hash"]=$hash;
                  $arrayDatos["telefono"]=$telefono;
                  $arrayDatos["estado"]=$estado;
                }else{
                  $arrayDatos["resultado"]="0";
                }
            }else{
            	$arrayDatos["resultado"]="0";
            }
          }
          if($rol == 'Domiciliario'){
            $stmt2 = $conexion->prepare("SELECT d.ID, u.rol, d.nombre, d.apellido, d.correo, u.password, u.hash, d.telefono, d.estado FROM usuario AS u INNER JOIN domiciliario AS d ON d.user = u.ID WHERE u.usuario = ? LIMIT 1");
            $stmt2->bind_param('s', $susername);
            $stmt2->execute();
            $stmt2->bind_result($ID, $rol , $nombre, $apellido, $correo, $password,  $hash, $telefono, $estado);
            if($stmt2->fetch()){
                $result = $stmt2->get_result();
                $hash = base64_encode(sha1($spassword . $hash, true) . $hash);
                if ($password == $hash) {
                  $arrayDatos["resultado"]="1";
                  $arrayDatos["ID"]=$ID;
                  $arrayDatos["rol"]=$rol;
                  $arrayDatos["foto"]="";
                  $arrayDatos["nombre"]=$nombre;
                  $arrayDatos["apellido"]=$apellido;
                  $arrayDatos["correo"]=$correo;
                  $arrayDatos["password"]=$password;
                  $arrayDatos["hash"]=$hash;
                  $arrayDatos["telefono"]=$telefono;
                  $arrayDatos["estado"]=$estado;
                }else{
                  $arrayDatos["resultado"]="0";
                }
            }else{
            	$arrayDatos["resultado"]="0";
            }
          }
        }else{
          $arrayDatos["resultado"]="0";
        }
      }
    } else {
       $arrayDatos["resultado"]="0";
    }
    $stmt->close();
    $conexion->close();
} else {
  $arrayDatos["resultado"]="2";
}
$dataArray[] = $arrayDatos;
echo json_encode($dataArray);
?>
