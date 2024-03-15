<?php

function conectar()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "adaditas";

    $con = new mysqli($servername,$username,$password,$dbname);
    //verifica conexion
    if($con->connect_error)
        die("Conexion fallida: ".$con->connect_error);
        //devuelve
        return $con;
}

?>
