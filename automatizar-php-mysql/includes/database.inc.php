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

    function __construct($xhost,$xusser,$xpassword,$xbase){ 
        $this ->bd = new mysqli($xhost,$xusser,$xpassword,$xbase);
        if ($this->bd->connect_errno){
                $this->errorMessage="Error de Conexion";
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
