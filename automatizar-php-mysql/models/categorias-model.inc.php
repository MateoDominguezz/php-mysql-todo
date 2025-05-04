<?php

class CategoriasModel{

    public function getAll(){
        $aResponse= [];
        $sql= "SELECT * FROM categorias ORDER BY id_categoria ASC";
        $bd= new DataBase();
    

    if (!$bd->getEstadoConexion()){
        $aResponse["estado"] = "ERROR";
        $aResponse['mensaje'] = $bd->getMensajeError();
        return $aResponse;
    } 
        $aResponse['estado'] = 'success';
        $aResponse['mensaje'] = $bd->getMensajeError();
        $aResponse['daots'] = $bd->getQuery($sql);
        $bd->close();
        return $aResponse;
    }

    public function getById($xid_categoria){
        $aResponse = [];
        $sql= "SELECT * FROM categoria WHERE id_categoria = $xid_categoria";
        $bd= new DataBase();

        if(!$bd->getEstadoConexion()){
            $aResponse["estado"] = "ERROR";
            $aResponse['mensaje'] = $bd->getMensajeError();
            return $aResponse;            
        }

        $aResponse["estado"] = 'success';
        $aResponse['mensaje'] = $bd->getMensajeError();
        $aResponse['datos'] = $bd->getQuery($sql);
        $bd->close();
        return $aResponse;
    }

    public function insert ($aDatos){
        $aResponse = [];

        $sql =  "INSERT INTO categorias (
                nombre)
                VALUES ('".$aDatos["nombre"]."')";

        $bd= new DataBase();

        if(!$bd->getEstadoConexion()){
            $aResponse["estado"] = "ERROR";
            $aResponse['mensaje'] = $bd->getMensajeError();
            return $aResponse;            
        }

        $aResponse['estado'] = 'success';
        $aResponse['mensaje'] = 'La categoria se actualizo perfectamente';
        $aResponse ['datos'] = $bd->execute($sql);

        $bd->close();
        return $aResponse;
    }

    public function update($aDatos){
        $aResponse= [];

        $sql = "UPDATE categorias
                SET categorias.nombre= '" . $aDatos["nombre"] . "' 
                WHERE categorias.id_categoria = ". $aDatos["id_categoria"];

        $bd= new DataBase();

        if(!$bd->getEstadoConexion()){
            $aResponse["estado"] = "ERROR";
            $aResponse['mensaje'] = $bd->getMensajeError();
            return $aResponse;            
        }

        $aResponse['estado'] = 'success';
        $aResponse['mensaje'] = 'La categoria se actualizo perfectamente';
        $aResponse ['datos'] = $bd->execute($sql);

        $bd->close();

        return $aResponse;
    }
}
