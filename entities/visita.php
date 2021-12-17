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

    function reportar(){

        //queryparainsertarunregistro
        $query="UPDATE visitas SET estado = ".$this->estado." WHERE id=".$this->id;

        //prepararquery
        $stmt=$this->conn->prepare($query);

        //executequery
        if($stmt->execute()){
            return true;
        }
        return false;
        
    }

    function filtrar($fechaInicio,$fechaFin){
        $query="SELECT * FROM ".$this->nombre_tabla." WHERE 1" ;
        if($this->cedula!=null){
            $query=$query." and cedula = '".$this->cedula."' ";
        }
        if($this->torre!=null){
            $query=$query." and torre = '".$this->torre."' ";
        }
        if($this->piso!=null){
            $query=$query." and piso = '".$this->piso."' ";
        }
        if($this->apartamento!=null){
            $query=$query." and apartamento = '".$this->apartamento."' ";
        }
        if($fechaInicio!=null){
            $query=$query." and fecha >= '".$fechaInicio."' ";
        }
        if($fechaFin!=null){
            $query=$query." and fecha <= '".$fechaFin."' ";
        }
        $stmt=$this->conn->prepare($query);
        $stmt->execute();

        $row=$stmt->fetchAll();

        return $row;
    }
}

?>