<?php
$host="localhost";
$user = "root";
$password = "";
$base = "conectando_php";

$bd = new mysqli($host,$user,$password,$base); 

if($bd ->connect_errno){
    echo "No se pudo conectar por: ". $bd->connect_errno;
}else{
    echo "Se pudo conectar por: ". $bd -> host_info;
}

$insert_categoria = (" INSERT INTO categoria (nombre, descripcion)
    VALUES ('Aventura','Categoria de aventura para toda la familia'),
           ('Terror', 'Categoria donde la gente se asusta'),
           ('Amor', 'Categoria donde la gente busca el amor')
");

if (!$bd->query($insert_categoria)){
    echo "No se pudo ingresar la categoria";
}else{
    echo "Se pudo ingresar las categorias";
}

$bd->close();
