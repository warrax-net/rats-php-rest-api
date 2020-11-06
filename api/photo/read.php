<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../../config/database.php';
    include_once '../../class/photos.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new photo($db);

    $stmt = $items->getPhotos();
    $itemCount = $stmt->rowCount();


    // echo json_encode($itemCount);

    if($itemCount > 0){
        
        $photoArr = array();
        $photoArr["body"] = array();
        $photoArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "name" => $name,
                "color" => $color, 
                "birth_date_d" => $birth_date_d,
                "birth_date_m" => $birth_date_m, 
                "birth_date_y" => $birth_date_y, 
                "death_date_d" => $death_date_d,
                "death_date_m" => $death_date_m, 
                "death_date_y" => $death_date_y, 
                "is_alive" => $is_alive,
                "death_reason" => $death_reason,
                "arrival_date_d" => $arrival_date_d,
                "arrival_date_m" => $arrival_date_m, 
                "arrival_date_y" => $arrival_date_y, 
                "description" => $description,
                "created" => $created
            );

            array_push($photoArr["body"], $e);
        }
        echo json_encode($photoArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>