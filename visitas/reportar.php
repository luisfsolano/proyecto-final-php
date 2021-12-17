<?php 
    session_start();  
    header('Content-Type: application/json; charset=utf-8');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    
    //obtenerconexiondebasededatos
    include_once'../class/conexion.php';

    //instanciarelobjetoproducto
    include_once'../entities/visita.php';
    $conex=new Conexion();
    $db=$conex->obtenerConexion();
    $visita=new Visita($db);

    $data = json_decode(file_get_contents('php://input'), true);

    $visita->id = $data['id'];
    $visita->estado = 2;
    
    if($visita->reportar()){
        http_response_code(201);
        echo json_encode(array("message"=>"success"));
    }else{
        http_response_code(503);
        echo json_encode(array("message"=>"error"));
    }



?>