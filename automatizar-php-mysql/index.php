<?php
include "database/includes.inc.php";

$bd = new DataBase("localhost","root","","conectando_php");

if($bd->getEstadoConexion()){
    echo $bd->getMessageError();
    exit;
}