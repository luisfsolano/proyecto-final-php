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
    $image = $data['image'];

    $visita->nombre = $data['nombre'];
    $visita->cedula = $data['cedula'];
    $visita->torre = $data['torre'];
    $visita->piso = $data['piso'];
    $visita->apartamento = $data['apartamento'];
    $visita->fecha = new DateTime();
    $visita->image = $visita->fecha->getTimestamp().'-'.$visita->cedula.'.png';
    $visita->usuario = $_SESSION['user_id'];
    $visita->estado = 1;
    
    if($visita->crear()){
        $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image));
        file_put_contents('../fotosrecepciones/'.$visita->image, $image); 
        http_response_code(201);
        echo json_encode(array("message"=>"La visita ha sido registrada."));
    }else{
        http_response_code(503);
        echo json_encode(array("message"=>"No se pudo registrar la visita."));
    }



?>