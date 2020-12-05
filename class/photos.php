<?php
    class Photo {

        // Connection
        private $conn;

        // Table
        private $db_table = "photos";
        private $link_table = "rat_photo_ids";

        // Columns
        public $id;
        public $title;
        public $description;
        public $is_video;
        public $url;
        public $date_d;
        public $date_m;
        public $date_y;

        public $rat_ids;
        public $rp_ids;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getPhotos(){
            $query = "SELECT * FROM {$this->db_table} ORDER BY id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $arr = [];
            $i = 0;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $arr[$i]['id'] = $row['id'];
                $arr[$i]['title'] = $row['title'];
                $arr[$i]['description'] = $row['description'];
                $arr[$i]['is_video'] = $row['is_video'];
                $arr[$i]['url'] = $row['url'];
                $arr[$i]['date_d'] = $row['date_d'];
                $arr[$i]['date_m'] = $row['date_m'];
                $arr[$i]['date_y'] = $row['date_y'];
                $ratArray = [];
                $sqlQuery = "SELECT rp.* FROM {$this->db_table} AS p JOIN rat_photo_ids AS rp ON p.id = rp.photo_id WHERE p.id = ? ORDER BY p.id, rp.id";
                $stmt2 = $this->conn->prepare($sqlQuery);

                $stmt2->bindParam(1, $row['id']);

                $stmt2->execute();
                while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                    array_push($ratArray, $row2['rat_id']);
                }
                $arr[$i]['rat_ids'] = $ratArray;
                $i++;
            }

            return $arr;
        }

        public function getPhotosQuery($all_alive, $rat_ids, $date_m, $date_y, $to_date_m, $to_date_y){
            $and_date_d = "";
            if (isset($date_m) && $date_m > 0 && isset($date_y) && $date_y > 0) {
                $and_date_d = "AND ((p.date_m >= {$date_m} AND p.date_y = {$date_y}) OR (p.date_y > {$date_y}) ";
            } else if ($date_m < 0 && (isset($date_y) && $date_y > 0)) {
                $and_date_d = " AND (p.date_y >= {$date_y}) ";
            }

            if (isset($to_date_m) && $to_date_m > 0 && isset($to_date_y) && $to_date_y > 0) {
                $and_date_d = $and_date_d . "AND ((p.date_m <= {$to_date_m} AND p.date_y = {$to_date_y}) OR (p.date_y < {$to_date_y})) ";
            } else if ($date_m < 0 && (isset($to_date_y) && $to_date_y > 0)) {
                $and_date_d = $and_date_d . "AND (p.date_y <= {$to_date_y}) ";
            }

            $query = "";
            if ($all_alive == 1 || empty($rat_ids)) {
                $query = "SELECT DISTINCT p.* FROM {$this->db_table} AS p JOIN rat_photo_ids AS rp ON p.id = rp.photo_id JOIN rats as r ON rp.rat_id = r.id WHERE r.is_alive = 1 " . $and_date_d . " ORDER BY p.id";

            } else {
                $and_rats = " r.id IN (";
                $i = 0;
                foreach ($rat_ids as $rat_id) {
                    if ($i == 0) {
                        $and_rats = $and_rats . $rat_id;
                    } else {
                        $and_rats = $and_rats . ", " . $rat_id;
                    }
                }
                $and_rats = $and_rats . ')';
                $query = "SELECT DISTINCT p.* FROM {$this->db_table} AS p JOIN rat_photo_ids AS rp ON p.id = rp.photo_id JOIN rats as r ON rp.rat_id = r.id WHERE " . $and_rats . $and_date_d . " ORDER BY p.id";
            }
            // return $query;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            $arr = [];
            $i = 0;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $arr[$i]['id'] = $row['id'];
                $arr[$i]['title'] = $row['title'];
                $arr[$i]['description'] = $row['description'];
                $arr[$i]['is_video'] = $row['is_video'];
                $arr[$i]['url'] = $row['url'];
                $arr[$i]['date_d'] = $row['date_d'];
                $arr[$i]['date_m'] = $row['date_m'];
                $arr[$i]['date_y'] = $row['date_y'];
                $ratArray = [];
                $sqlQuery = "SELECT rp.* FROM {$this->db_table} AS p JOIN rat_photo_ids AS rp ON p.id = rp.photo_id WHERE p.id = ? ORDER BY p.id, rp.id";
                $stmt2 = $this->conn->prepare($sqlQuery);

                $stmt2->bindParam(1, $row['id']);

                $stmt2->execute();
                while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                    array_push($ratArray, $row2['rat_id']);
                }
                $arr[$i]['rat_ids'] = $ratArray;
                $i++;
            }
            return $arr;
        }

        // CREATE
        public function createPhoto(){
            $sqlQuery = "INSERT INTO
                        {$this->db_table}
                    SET
                        title = :title, 
                        description = :description, 
                        is_video = :is_video,
                        url = :url, 
                        date_d = :date_d, 
                        date_m = :date_m, 
                        date_y = :date_y;
                    ";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->title=htmlspecialchars(strip_tags($this->title));
            $this->description=htmlspecialchars(strip_tags($this->description));
            $this->url=htmlspecialchars(strip_tags($this->url));
            $this->date_d=htmlspecialchars(strip_tags($this->date_d));
            $this->date_m=htmlspecialchars(strip_tags($this->date_m));
            $this->date_y=htmlspecialchars(strip_tags($this->date_y));    
            $this->is_video=htmlspecialchars(strip_tags($this->is_video));        

            $bool = $stmt->execute([
                'title'       => $this->title,
                'description' => $this->description,
                'is_video'    => $this->is_video,
                'url'         => $this->url,
                'date_d'      => $this->date_d,
                'date_m'      => $this->date_m,
                'date_y'      => $this->date_y,
            ]);

            $photo_id = $this->conn->lastInsertId();
            
            foreach($this->rat_ids as $rat_id) {
                $sqlQuery = "INSERT INTO
                        {$this->link_table}
                    SET
                        rat_id = :rat_id, 
                        photo_id = :photo_id
                    ";
        
                $stmt2 = $this->conn->prepare($sqlQuery);
                
                if (!$stmt2->execute([
                    'rat_id'      => $rat_id,
                    'photo_id'      => $photo_id,
                ])) {
                    return $stmt2->errorInfo();
                }
            }
            if ($bool) {
                return $bool;
            }
            return $stmt->errorInfo();
        }

        // UPDATE
        public function getSinglePhoto(){
            $sqlQuery = "SELECT * FROM {$this->db_table} WHERE id = ? LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $dataRow['id'];
            $this->title = $dataRow['name'];
            $this->description = $dataRow['description'];
            $this->url = $dataRow['url'];
            $this->is_video = $dataRow['is_video'];
            $this->date_d = $dataRow['date_d'];
            $this->date_m = $dataRow['date_m'];
            $this->date_y = $dataRow['date_y'];
        }        

        public function getPhotosForPhotoId(){
            $sqlQuery = "SELECT rp.id AS rp_id, rp.photo_id AS photo_id, rp.rat_id AS rat_id, p.* FROM {$this->db_table} AS r JOIN rat_photo_ids  AS rp ON r.id = rp.rat_id JOIN photos AS p ON rp.photo_id = p.id WHERE r.id = ? LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->rat_id);

            $stmt->execute();
            
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id=$dataRow['id'];
            $this->rp_id=$dataRow['rp_id'];
            $this->rat_id=$dataRow['rat_id'];
            $this->title=$dataRow['name'];
            $this->description=$dataRow['description'];
            $this->url=$dataRow['url'];
            $this->is_video = $dataRow['is_video'];
            $this->date_d=$dataRow['date_d'];
            $this->date_m=$dataRow['date_m'];
            $this->date_y=$dataRow['date_y'];
        }

        // UPDATE
        public function updatePhoto(){
            $sqlQuery = "UPDATE IGNORE 
                        {$this->db_table}
                    SET
                        title = :title, 
                        is_video = :is_video,
                        description = :description, 
                        url = :url, 
                        date_d = :date_d, 
                        date_m = :date_m, 
                        date_y = :date_y;
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->title=htmlspecialchars(strip_tags($this->title));
            $this->description=htmlspecialchars(strip_tags($this->description));
            $this->url=htmlspecialchars(strip_tags($this->url));
            $this->date_d=htmlspecialchars(strip_tags($this->date_d));
            $this->date_m=htmlspecialchars(strip_tags($this->date_m));
            $this->date_y=htmlspecialchars(strip_tags($this->date_y));   
            $this->is_video=htmlspecialchars(strip_tags($this->is_video));  
        
            $bool = $stmt->execute([
                'id'      => $this->id,
                'title'      => $this->title,
                'description' => $this->description,
                'url'         => $this->url,
                'is_video'    => $this->is_video,
                'date_d'      => $this->date_d,
                'date_m'      => $this->date_m,
                'date_y'      => $this->date_y,
            ]);

            $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            $photo_id = $this->id;
            
            $deleteQuery = "DELETE FROM
            {$this->link_table}
                WHERE
                    photo_id = :photo_id
                ";

            $stmtd = $this->conn->prepare($deleteQuery);
            
            if (!$stmtd->execute([
                'photo_id'      => $photo_id,
            ])) {
                return $stmtd->errorInfo();
            }

            $stmtd->fetchAll(PDO::FETCH_ASSOC);
            $stmtd->closeCursor();
            foreach($this->rat_ids as $rat_id) {
                $sqlQuery = "INSERT INTO
                        {$this->link_table}
                    SET
                        rat_id = :rat_id, 
                        photo_id = :photo_id
                    ";
        
                $stmt2 = $this->conn->prepare($sqlQuery);
                
                if (!$stmt2->execute([
                    'rat_id'      => $rat_id,
                    'photo_id'      => $photo_id,
                ])) {
                    return $stmt2->errorInfo();
                }
                $stmt2->fetchAll(PDO::FETCH_ASSOC);
                $stmt2->closeCursor();
            }
            if ($bool) {
                return $bool;
            }
            return $stmt->errorInfo();
        }

        // DELETE
        function deletePhoto(){
            $sqlQuery = "DELETE FROM {$this->db_table} WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>

