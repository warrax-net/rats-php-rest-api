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

    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    $item->getSingleRat();

    if($item->name != null){
        // create array
        $emp_arr = array(
            "id" => $item->id,
            "name" => $item->name,
            "color" => $item->color, 
            "birth_date_d" => $item->birth_date_d,
            "birth_date_m" => $item->birth_date_m, 
            "birth_date_y" => $item->birth_date_y, 
            "death_date_d" => $item->death_date_d,
            "death_date_m" => $item->death_date_m, 
            "death_date_y" => $item->death_date_y, 
            "is_alive" => $item->is_alive,
            "death_reason" => $item->death_reason,
            "arrival_date_d" => $item->arrival_date_d,
            "arrival_date_m" => $item->arrival_date_m, 
            "arrival_date_y" => $item->arrival_date_y, 
            "description" => $item->description,
            "created" => $item->created
        );
      
        http_response_code(200);
        echo json_encode($emp_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Крыса не найдена.");
    }
?>