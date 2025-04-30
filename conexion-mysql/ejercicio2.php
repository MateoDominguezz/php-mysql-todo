<?php
    $user = "root";
    $password = "";
    $base = "conectando_php";
    $host = "localhost";

$bd = new mysqli($host,$user,$password,$base);

if ($bd -> connect_errno){
    echo "Hubo un error en: ". $bd -> connect_errno;
}else{
    echo "Se conecto todo bien mediante: ". $bd ->host_info. "<br>";
}

$bd -> set_charset("utf8");

$bd -> real_query(" SELECT l.id_libro, c.nombre, l.titulo,  l.isbn
    FROM libro AS l
    JOIN categoria c ON l.id_categoria = c.id_categoria;
"); 

$result = $bd ->use_result();

while ($fila = $result -> fetch_assoc()){
    echo "Id: ". $fila['id_libro']. 
    ", Categoria: ".$fila['nombre']. ", Titulo: ". $fila['titulo']. ", Isbn: ".$fila['isbn']. "<br>";
}

$bd->close();