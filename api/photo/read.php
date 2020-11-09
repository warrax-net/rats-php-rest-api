<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../../config/database.php';
    include_once '../../class/photos.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Photo($db);

    $stmt = $items->getPhotos();
    $itemCount = count($stmt);
    if($itemCount > 0){
        $photoArr = array();
        $photoArr["body"] = array();
        $photoArr["itemCount"] = $itemCount;
        foreach ($stmt as $item) {
            if($item['title'] != null){
                // create array
                $e = array(
                    "id" => $item['id'],
                    "title" => $item['title'],
                    "date_d" => $item['date_d'],
                    "date_m" => $item['date_m'], 
                    "date_y" => $item['date_y'], 
                    "rat_ids" => $item['rat_ids'],
                    "is_video" => $item['is_video'], 
                    "description" => $item['description'],
                    "url" => $item['url']
                );
            
                array_push($photoArr["body"], $e);
            }
        }

        http_response_code(200);
        echo json_encode($photoArr);
    } else {
        http_response_code(404);
        echo json_encode(
            array("message" => "Ничего не найдено.")
        );
    }
?>