<?php
require_once("dbClass.php");
ini_set('display_errors',1);

class clsCnsc{
  public $id, $link, $estado;
  public $conexion;

  public function __construct(){
    $this->conexion = new dbConect();
  }



  public function CantidadMesPedidos($id){
    $resultado = $this->conexion->ejecutarQuery("SELECT count(*) AS id FROM `pedido` WHERE MONTH(fecha) = $id ");
    return $resultado;
  }


  public function ConsultarIdDomiciliario($id){
    $resultado = $this->conexion->ejecutarQuery("SELECT * FROM domiciliario WHERE  ID = $id ");
    return $resultado;
  }


    public function ConsultarUltimosPedidos(){
      $resultado = $this->conexion->ejecutarQuery("SELECT * FROM pedido ORDER BY ID DESC LIMIT 5");
      return $resultado;
    }

    public function ConsultarConfig(){
      $resultado = $this->conexion->ejecutarQuery("SELECT * FROM configuracion");
      return $resultado;
    }

    public function ConsultarPedidos(){
      $resultado = $this->conexion->ejecutarQuery("SELECT * FROM pedido");
      return $resultado;
    }

    public function CantidadClientes(){
      $resultado = $this->conexion->ejecutarQuery("SELECT COUNT(*) AS cantidad FROM cliente");
      return $resultado;
    }
    public function CantidadPedidos(){
      $resultado = $this->conexion->ejecutarQuery("SELECT COUNT(*) AS cantidad FROM pedido");
      return $resultado;
    }
    public function CantidadPlatos(){
      $resultado = $this->conexion->ejecutarQuery("SELECT COUNT(*) AS cantidad FROM plato");
      return $resultado;
    }
    public function CantidadCategoria(){
      $resultado = $this->conexion->ejecutarQuery("SELECT COUNT(*) AS cantidad FROM categoria");
      return $resultado;
    }



  public function ValidarUser($nombre, $password){
    $resultado = $this->conexion->ejecutarQuery("SELECT * FROM usuario WHERE usuario = '{$nombre}' AND rol = 'administrador'");
    $result = mysqli_fetch_assoc($resultado);
    $salt = $result['hash'];
    $encrypted_password = $result['password'];
    $hash = self::checkhashSSHA($salt, $password);
    if ($encrypted_password == $hash) {
         $resultadox = $this->conexion->ejecutarQuery("SELECT a.ID, correo, nombre, apellido, telefono, usuario, password FROM administrador AS a INNER JOIN usuario AS u ON u.ID = a.user WHERE a.correo = '{$nombre}' ");
        return $resultadox;
    }else{
       return NULL;
    }
  }

  public function hashSSHA($password) {
      $salt = sha1(rand());
      $salt = substr($salt, 0, 10);
      $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
      $hash = array("salt" => $salt, "encrypted" => $encrypted);
      return $hash;
  }
  public function checkhashSSHA($salt, $password) {
      $hash = base64_encode(sha1($password . $salt, true) . $salt);
      return $hash;
  }

  public function CrearAdmin($negocio, $nombre,  $apellido, $direccion , $telefono, $usuario , $password, $rol){
     $this->negocio = $negocio;
     $this->nombre = $nombre;
     $this->apellido = $apellido;
     $this->direccion = $direccion;
     $this->telefono = $telefono;
     $this->usuario = $usuario;
     $this->password = $password;
     $this->rol = $rol;

     date_default_timezone_set('America/Mexico_City');
     $now = date('Y-m-d H:i:s');

     $hash = $this->hashSSHA($password);
     $encrypted_password = $hash["encrypted"]; // encrypted password
     $salt = $hash["salt"];

     $resultado = $this->conexion->ejecutarQuery("INSERT INTO usuario(usuario, password, hash,  rol) VALUES ('{$this->usuario}','{$encrypted_password}','{$salt}','{$this->rol}');");
     $id = self::MaxUser();

     $resultado = $this->conexion->ejecutarQuery("INSERT INTO administrador(nombre, correo, apellido, user, telefono, estado) VALUES ('{$this->nombre}','{$this->usuario}', '{$this->apellido}', '{$id}','{$this->telefono}','Activo');");

     return true;
   }


   public function MaxUser(){
     $resultado = $this->conexion->ejecutarQuery("SELECT MAX(ID) AS id FROM usuario");
     $valor = mysqli_fetch_assoc($resultado);
     return $valor['id'];
   }



public function EditarConfiguracion($tipo, $nombre, $direccion, $correo, $telefono, $latitud, $longitud, $soporte, $color, $foto, $foto1, $foto2, $foto3, $foto4){
  $this->tipo = $tipo;
  $this->nombre = $nombre;
  $this->direccion = $direccion;
  $this->correo = $correo;
  $this->telefono = $telefono;
  $this->latitud = $latitud;
  $this->longitud = $longitud;
  $this->soporte = $soporte;
  $this->color = $color;
  $this->foto = $foto;
  $this->foto1 = $foto1;
  $this->foto2 = $foto2;
  $this->foto3 = $foto3;
  $this->foto4 = $foto4;

  $resultado = $this->conexion->ejecutarQuery("UPDATE configuracion AS c SET
  c.logo = '{$this->foto}',
  c.imgApp = '{$this->foto1}',
  c.tipo = '{$this->tipo}',
  c.whattsapp_soporte = '{$this->soporte}',
  c.colorApp = '{$this->color}',
  c.banner1 = '{$this->foto2}',
  c.banner2 = '{$this->foto3}',
  c.banner3 = '{$this->foto4}',
  c.negocio = '{$this->nombre}',
  c.direccion = '{$this->direccion}',
  c.correo = '{$this->correo}',
  c.telefono = '{$this->telefono}',
  c.latitud = '{$this->latitud}',
  c.longitud = '{$this->longitud}'
  WHERE c.id = '1'");

  return true;
}






  public function EditarPEstudiantes($idprueba, $idestudiante){
    $this->idprueba = $idprueba;
    $this->idestudiante = $idestudiante;
    $resultado = $this->conexion->ejecutarQuery("INSERT INTO estudiante_prueba(fkprueba, fkestudiante) VALUES ('{$this->idprueba}','{$this->idestudiante}');");
    return true;
  }


  public function crearDomiciliario($nombre, $apellido, $correo, $contacto, $tipo, $estado, $user, $password, $rol){
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->correo= $correo;
    $this->contacto = $contacto;
    $this->tipo = $tipo;
    $this->estado = $estado;
    $this->user = $user;
    $this->password = $password;
    $this->rol = $rol;

   $hash = $this->hashSSHA($password);
   $encrypted_password = $hash["encrypted"]; // encrypted password
   $salt = $hash["salt"];

   $resultado = $this->conexion->ejecutarQuery("INSERT INTO usuario(usuario, password, hash,  rol) VALUES ('{$this->correo}','{$encrypted_password}','{$salt}','{$this->rol}');");
   $id = self::MaxUser();

    $resultado = $this->conexion->ejecutarQuery("INSERT INTO domiciliario(nombre,  apellido,  correo, telefono, tipo, estado, user)
    VALUES ('{$this->nombre}','{$this->apellido}', '{$this->correo}',
      '{$this->contacto}' , '{$this->tipo}' , '{$this->estado}'
      ,'{$id}');");
    return true;
  }





    public function crearSucursal($nombre, $latitud, $longitud, $telefono, $direccion, $foto){
      $this->nombre = $nombre;
      $this->latitud = $latitud;
      $this->longitud = $longitud;
      $this->telefono = $telefono;
      $this->direccion = $direccion;
      $this->foto = $foto;

      $resultado = $this->conexion->ejecutarQuery("INSERT INTO sucursal(latitud,  longitud, telefono, direccion, foto) VALUES ('{$this->latitud}','{$this->longitud}', '{$this->telefono}', '{$this->direccion}' , '{$this->foto}');");
      return true;
    }






  public function crearPlato($nombre, $descripcion, $precio, $categoria, $estado, $foto){
    $this->nombre = $nombre;
    $this->descripcion = $descripcion;
    $this->precio = $precio;
    $this->categoria = $categoria;
    $this->estado = $estado;
    $this->foto = $foto;

    $resultado = $this->conexion->ejecutarQuery("INSERT INTO plato(nombre, descripcion, foto, precio, fkcategoria, estado) VALUES ('{$this->nombre}','{$this->descripcion}', '{$this->foto}', '{$this->precio}', '{$this->categoria}', '{$this->estado}');");
    return true;
  }


  public function crearCategoria($categoria, $estado, $foto){
    $this->categoria = $categoria;
    $this->estado = $estado;
    $this->foto = $foto;

    $resultado = $this->conexion->ejecutarQuery("INSERT INTO categoria(nombre, estado, foto) VALUES ('{$this->categoria}','{$this->estado}', '{$this->foto}' );");
    return true;
  }


public function ConsultarAdministrador(){
  $resultado = $this->conexion->ejecutarQuery("SELECT * FROM administrador AS s");
  return $resultado;
}

  public function ConsultarSucursal(){
    $resultado = $this->conexion->ejecutarQuery("SELECT * FROM sucursal AS s");
    return $resultado;
  }


  public function ConsultarDomiciliario(){
    $resultado = $this->conexion->ejecutarQuery("SELECT * FROM domiciliario AS t");
    return $resultado;
  }



  public function ConsultarClientes(){
    $resultado = $this->conexion->ejecutarQuery("SELECT * FROM cliente AS t");
    return $resultado;
  }




  public function ConsultarPlatos(){
    $resultado = $this->conexion->ejecutarQuery("SELECT p.ID, p.nombre, p.precio, p.descripcion, p.foto, p.estado, c.nombre AS categoria FROM plato AS p INNER JOIN categoria AS c ON p.fkcategoria = c.ID");
    return $resultado;
  }
  public function ConsultarCategorias(){
    $resultado = $this->conexion->ejecutarQuery("SELECT * FROM categoria AS t");
    return $resultado;
  }

  public function ConsultarIdCategoria($id){
    $resultado = $this->conexion->ejecutarQuery("SELECT * FROM categoria AS t WHERE t.ID = '{$id}'");
    return $resultado;
  }


  public function ConsultarPlatoPedido($id){
    $resultado = $this->conexion->ejecutarQuery("SELECT * FROM plato_pedido AS p WHERE p.fkpedido = '{$id}'");
    return $resultado;
  }



  public function ConsultarIdPedido($id){
    $resultado = $this->conexion->ejecutarQuery("SELECT * FROM pedido AS p WHERE p.ID = '{$id}'");
    return $resultado;
  }

  public function ConsultarIdSucursal($id){
    $resultado = $this->conexion->ejecutarQuery("SELECT * FROM sucursal AS t WHERE t.ID = '{$id}'");
    return $resultado;
  }


  public function ConsultarIdPlatos($id){
    $resultado = $this->conexion->ejecutarQuery("SELECT * FROM plato AS t WHERE t.ID = '{$id}'");
    return $resultado;
  }


  public function EliminarDomiciliario($id){
    $this->id = $id;
    $resultado = $this->conexion->ejecutarQuery("DELETE FROM domiciliario WHERE ID = '{$this->id}'");
    return true;
  }



  public function EliminarPedido($id){
    $this->id = $id;
    $resultado = $this->conexion->ejecutarQuery("DELETE FROM pedido WHERE ID = '{$this->id}'");
    return true;
  }

  public function EliminarCategoria($id){
    $this->id = $id;
    $resultado = $this->conexion->ejecutarQuery("DELETE FROM categoria WHERE ID = '{$this->id}'");
    return true;
  }

  public function EliminarPlatos($id){
    $this->id = $id;
    $resultado = $this->conexion->ejecutarQuery("DELETE FROM plato WHERE ID = '{$this->id}'");
    return true;
  }
}
?>
