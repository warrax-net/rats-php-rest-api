<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../../config/database.php';
    include_once '../../class/rats.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Rat($db);

    $data = json_decode(file_get_contents("php://input"));

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
    $response = $item->createRat();
    if($response === true){
        echo 'Крыса создана!';
    } else{
        var_dump($response);
    }
?>