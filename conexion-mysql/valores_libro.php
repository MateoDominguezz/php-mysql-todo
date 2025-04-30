<?php
$host= "localhost";
$user ="root";
$base = "conectando_php";
$password = "";

$bd = new mysqli($host,$user,$password,$base);

$valor_libro = (" INSERT INTO libro (titulo,isbn,id_categoria)
VALUES ('Las Aventuras','12343','1'),
       ('El terror','1243','2'),
       ('Mary Poppins', '9867','3')
");

if (!$bd ->query($valor_libro)){
    echo "No se pudo agregar los datos";
} else{
    echo "Se pudieron agregar los datos";
}

$bd ->close();