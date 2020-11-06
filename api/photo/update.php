<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../class/photos.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Photo($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->id = $data->id;
    
    // photo values
    $item->name = $data->name; 
    $item->color = $data->color; 
    $item->birth_date_d = $data->birth_date_d;
    $item->birth_date_m = $data->birth_date_m; 
    $item->birth_date_y = $data->birth_date_y; 
    $item->death_date_d = $data->death_date_d; 
    $item->death_date_m = $data->death_date_m; 
    $item->death_date_y = $data->death_date_y; 
    $item->is_alive = $data->is_alive;
    $item->death_reason = $data->death_reason;
    $item->arrival_date_d = $data->arrival_date_d;
    $item->arrival_date_m = $data->arrival_date_m; 
    $item->arrival_date_y = $data->arrival_date_y; 
    $item->description = $data->description;
    
    if($item->updatePhoto()){
        echo json_encode("Photo data updated.");
    } else{
        echo json_encode("Data could not be updated");
    }
?>