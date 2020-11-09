<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../../config/database.php';
    include_once '../../class/photos.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Photo($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->id = $data->id;
    
    // photo values
    $item->title = $data->title; 
    $item->description = $data->description; 
    $item->date_d = $data->date_d;
    $item->date_m = $data->date_m; 
    $item->date_y = $data->date_y; 
    $item->url = $data->url; 
    $item->is_video = $data->is_video;
    $item->rat_ids = $data->rat_ids;
    
    $response = $item->updatePhoto();
    if($response === true){
        echo 'Данные крысы обновлены!';
    } else{
        var_dump($response);
    }
?>