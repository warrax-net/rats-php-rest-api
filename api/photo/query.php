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

    $items = new Photo($db);

    $data = json_decode(file_get_contents("php://input"));
    
    $stmt = $items->getPhotosQuery($data->all_alive, $data->rat_ids, $data->from_date_m, $data->from_date_y, $data->to_date_m, $data->to_date_y);
    
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