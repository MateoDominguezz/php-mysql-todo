<?php

$host = "localhost";
$base = "conectando_php";
$user = "root";
$password = "";

$bd= new mysqli($host,$user,$password,$base);

if ($bd -> connect_errno){
    echo "Hubo un error al conectarse a la base de datos: ". $bd -> connect_errno;
}else{
    echo "Conecxion satisfactoria: ". $bd -> host_info;
}

$bd ->set_charset("utf8");

$nombre = "Jose";
$apellido = "Rivera";

$sql = "INSERT INTO cliente(nombre,apellido)
        VALUES ('$nombre','$apellido');
";

if (!$bd -> query($sql)){
    echo "No se pudo insertar";
}else{
    echo "Se inserto exitosamente";
}


$bd -> close();