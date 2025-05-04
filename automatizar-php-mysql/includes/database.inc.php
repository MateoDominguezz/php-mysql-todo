<?php
class DataBase{
    private $bd;
    private $conexion;
    private $errorMessage;
    
    public function getEstadoConexion(){
        return $this->conexion; 
    }

    public function getMessageError(){
        return $this->errorMessage;
    }

    function __construct(){ 
        $this ->bd = new mysqli(HOST,USER,PASSWORD,DATABASE);
        if ($this->bd->connect_errno){
                $this->errorMessage="Error de Conexion ("
                . $this->bd->connect_errno . ") "
                . $this ->bd->connect_errno;
            $this->conexion = false;
        } else{
            $this->conexion = true;
            $this->bd->set_charset("utf8");
        }
    }

    public function getQuery($xsql){
        $this->bd->real_query($xsql);
        $resultado = $this->bd->use_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function execute($xsql){
        if (!$this->bd->query($xsql)){
            return false;
        } else{
            return true;
        }
    }

    public function close(){
        $this->bd->close();
    }
}
