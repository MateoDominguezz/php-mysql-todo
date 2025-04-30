<?php

$host= "localhost";
$user = "root";
$password = "";
$base = "conectando_php";

$bd = new mysqli($host,$user,$password,$base);

if ($bd -> connect_errno) {
    echo "Hubo un error al conectarse a la base de datos: ".$bd->connect_errno . "<br>";
}else{
    echo "Se pudo conectar satisfactoriamente: " . $bd ->host_info ."<br>";
}

$bd -> set_charset ("utf8");

$bd -> real_query("SELECT * FROM cliente");
$resultado = $bd -> use_result();

echo "Su resultado es: <br>";

while($fila = $resultado ->fetch_assoc()){
    echo "id: ". $fila["id_cliente"] . " Nombre: ".$fila["nombre"]."<br>";
}

$bd ->close();