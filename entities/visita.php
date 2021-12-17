<?php

class Visita{

    private$conn;
    private$nombre_tabla="visitas";

    public $id;
    public $nombre;
    public $cedula;
    public $torre;
    public $piso;
    public $apartamento;
    public $image;
    public $fecha;
    public $usuario;
    public $estado;

    public function __construct($db){
        $this->conn=$db;
    }

    function crear(){

        //queryparainsertarunregistro
        $query="INSERT INTO " .$this->nombre_tabla." SET 
        nombre=:nombre, 
        cedula=:cedula, 
        torre=:torre, 
        piso=:piso, 
        apartamento=:apartamento, 
        image=:image, 
        fecha=:fecha, 
        usuario=:usuario, 
        estado=:estado";

        //prepararquery
        $stmt=$this->conn->prepare($query);
        //sanitize
        
        $fechaString = $this->fecha->format('Y-m-d H:i:s');

        $stmt->bindParam(":nombre",$this->nombre);
        $stmt->bindParam(":cedula",$this->cedula);
        $stmt->bindParam(":torre",$this->torre);
        $stmt->bindParam(":piso",$this->piso);
        $stmt->bindParam(":apartamento",$this->apartamento);
        $stmt->bindParam(":image",$this->image);
        $stmt->bindParam(":fecha",$fechaString);
        $stmt->bindParam(":usuario",$this->usuario);
        $stmt->bindParam(":estado",$this->estado);
        //executequery
        if($stmt->execute()){
            return true;
        }
        return false;
        
    }
}

?>