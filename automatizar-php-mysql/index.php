<?php
include "autoload.php";

$bd = new DataBase();

if($bd->getEstadoConexion()){
    echo $bd->getMessageError();
    exit;
}

$datos = $bs->getQuery("SELECT * FROM categorias ORDER BY id_categorias AS");
for ($i=0; sizeof($datos);$i++){
    echo 'Id: '.$datos[$i]["id_cateegorias"]. "Nombre: ".$datos[$i]["nombre"]. "<br>";
}

$bd->close();