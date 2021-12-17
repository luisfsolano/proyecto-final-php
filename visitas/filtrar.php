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

    $visita->cedula = $data['cedula'];

    $visita->torre = isset($data['torre']) ? $data['torre'] : null;
    $visita->piso = isset($data['piso']) ? $data['piso'] : null;
    $visita->apartamento = isset($data['apartamento']) ? $data['apartamento'] : null;
    
    $rs = $visita->filtrar($data['fechaInicio'],$data['fechaFin']);
    
    if($rs){
        http_response_code(200);
        echo json_encode(array("message"=>$rs));
    }else{
        http_response_code(204);
        echo json_encode(array("message"=>"error en la busqueda"));
    }



?>