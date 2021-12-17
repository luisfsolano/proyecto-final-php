<?php
    class Conexion{
        //especificarlascredencialesdebasededatos
        private $host = "localhost:3306"; 
        private $db_name = "php_login_database";
        private $username = "root";
        private $password = "";
        public $conn;
        
        //obtenerlaconexiondelabasededatos
        public function obtenerConexion(){
            $this->conn=null;
            try{
                $this->conn=new PDO("mysql:host=" .$this->host. "; dbname=".$this->db_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException$exception){
                echo"Errordeconexionabasededatos:".$exception->getMessage();
            }
        return$this->conn;
        }
    }
    
?>