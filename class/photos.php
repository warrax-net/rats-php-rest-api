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
        public $url;
        public $date_d;
        public $date_m;
        public $date_y;

        public $rat_id;
        public $rp_id;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getPhotos(){
        $sqlQuery = "SELECT * FROM {$this->db_table}";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createPhoto(){
            $sqlQuery = "INSERT INTO
                        {$this->db_table}
                    SET
                        title = :title, 
                        description = :description, 
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
            
            // bind data
            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":url", $this->url);
            $stmt->bindParam(":date_d", $this->date_d);
            $stmt->bindParam(":date_m", $this->date_m);
            $stmt->bindParam(":date_y", $this->date_y);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // UPDATE
        public function getSinglePhoto(){
            $sqlQuery = "SELECT * FROM {$this->db_table} WHERE id = ? LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id=$dataRow['id'];
            $this->title=$dataRow['name'];
            $this->description=$dataRow['description'];
            $this->url=$dataRow['url'];
            $this->date_d=$dataRow['date_d'];
            $this->date_m=$dataRow['date_m'];
            $this->date_y=$dataRow['date_y'];
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
            $this->date_d=$dataRow['date_d'];
            $this->date_m=$dataRow['date_m'];
            $this->date_y=$dataRow['date_y'];
        }

        // UPDATE
        public function updatePhoto(){
            $sqlQuery = "UPDATE
                        {$this->db_table}
                    SET
                        title = :title, 
                        description = :description, 
                        url = :url, 
                        date_d = :date_d, 
                        date_m = :date_m, 
                        date_y = :date_y;
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->age=htmlspecialchars(strip_tags($this->age));
            $this->designation=htmlspecialchars(strip_tags($this->designation));
            $this->created=htmlspecialchars(strip_tags($this->created));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":url", $this->url);
            $stmt->bindParam(":date_d", $this->date_d);
            $stmt->bindParam(":date_m", $this->date_m);
            $stmt->bindParam(":date_y", $this->date_y);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
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

