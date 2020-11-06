<?php
    class Rat {

        // Connection
        private $conn;

        // Table
        private $db_table = "rats";

        // Columns
        public $id;
        public $name;
        public $color;
        public $birth_date_d;
        public $birth_date_m;
        public $birth_date_y;
        public $death_date_d;
        public $death_date_m;
        public $death_date_y;
        public $is_alive;
        public $death_reason;
        public $arrival_date_d;
        public $arrival_date_m;
        public $arrival_date_y;
        public $description;
        public $created;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getRats(){
            $sqlQuery = "SELECT * FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createRat(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        name = :name, 
                        color = :color, 
                        birth_date_d = :birth_date_d, 
                        birth_date_m = :birth_date_m, 
                        birth_date_y = :birth_date_y, 
                        death_date_d = :death_date_d, 
                        death_date_m = :death_date_m, 
                        death_date_y = :death_date_y, 
                        is_alive = :is_alive, 
                        death_reason = :death_reason, 
                        arrival_date_d = :arrival_date_d, 
                        arrival_date_m = :arrival_date_m, 
                        arrival_date_y = :arrival_date_y, 
                        description = :description, 
                        created = :created";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->color=htmlspecialchars(strip_tags($this->color));
            $this->birth_date_d=htmlspecialchars(strip_tags($this->birth_date_d));
            $this->birth_date_m=htmlspecialchars(strip_tags($this->birth_date_m));
            $this->birth_date_y=htmlspecialchars(strip_tags($this->birth_date_y));
            $this->death_date_d=htmlspecialchars(strip_tags($this->death_date_d));
            $this->death_date_m=htmlspecialchars(strip_tags($this->death_date_m));
            $this->death_date_y=htmlspecialchars(strip_tags($this->death_date_y));
            $this->is_alive=htmlspecialchars(strip_tags($this->is_alive));
            $this->death_reason=htmlspecialchars(strip_tags($this->death_reason));
            $this->arrival_date_d=htmlspecialchars(strip_tags($this->arrival_date_d));
            $this->arrival_date_m=htmlspecialchars(strip_tags($this->arrival_date_m));
            $this->arrival_date_y=htmlspecialchars(strip_tags($this->arrival_date_y));
            $this->description=htmlspecialchars(strip_tags($this->description));
            $this->created=htmlspecialchars(strip_tags($this->created));
        
            // bind data
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":color", $this->color);
            $stmt->bindParam(":birth_date_d", $this->birth_date_d);
            $stmt->bindParam(":birth_date_m", $this->birth_date_m);
            $stmt->bindParam(":birth_date_y", $this->birth_date_y);
            $stmt->bindParam(":death_date_d", $this->death_date_d);
            $stmt->bindParam(":death_date_m", $this->death_date_m);
            $stmt->bindParam(":death_date_y", $this->death_date_y);
            $stmt->bindParam(":is_alive", $this->is_alive);
            $stmt->bindParam(":death_reason", $this->death_reason);
            $stmt->bindParam(":arrival_date_d", $this->arrival_date_d);
            $stmt->bindParam(":arrival_date_m", $this->arrival_date_m);
            $stmt->bindParam(":arrival_date_y", $this->arrival_date_y);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":created", $this->created);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // UPDATE
        public function getSingleRat(){
            $sqlQuery = "SELECT * FROM {$this->db_table} WHERE id = ? LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->name=$dataRow['name'];
            $this->color=$dataRow['color'];
            $this->birth_date_d=$dataRow['birth_date_d'];
            $this->birth_date_m=$dataRow['birth_date_m'];
            $this->birth_date_y=$dataRow['birth_date_y'];
            $this->death_date_d=$dataRow['death_date_d'];
            $this->death_date_m=$dataRow['death_date_m'];
            $this->death_date_y=$dataRow['death_date_y'];
            $this->is_alive=$dataRow['is_alive'];
            $this->death_reason=$dataRow['death_reason'];
            $this->arrival_date_d=$dataRow['arrival_date_d'];
            $this->arrival_date_m=$dataRow['arrival_date_m'];
            $this->arrival_date_y=$dataRow['arrival_date_y'];
            $this->description=$dataRow['description'];
            $this->created=$dataRow['created'];
        }        

        // UPDATE
        public function updateRat(){
            $sqlQuery = "UPDATE
                        {$this->db_table}
                    SET
                        name = :name, 
                        color = :color, 
                        birth_date_d = :birth_date_d, 
                        birth_date_m = :birth_date_m, 
                        birth_date_y = :birth_date_y, 
                        death_date_d = :death_date_d, 
                        death_date_m = :death_date_m, 
                        death_date_y = :death_date_y, 
                        is_alive = :is_alive, 
                        death_reason = :death_reason, 
                        arrival_date_d = :arrival_date_d, 
                        arrival_date_m = :arrival_date_m, 
                        arrival_date_y = :arrival_date_y, 
                        description = :description, 
                        created = :created
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
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":color", $this->color);
            $stmt->bindParam(":birth_date_d", $this->birth_date_d);
            $stmt->bindParam(":birth_date_m", $this->birth_date_m);
            $stmt->bindParam(":birth_date_y", $this->birth_date_y);
            $stmt->bindParam(":death_date_d", $this->death_date_d);
            $stmt->bindParam(":death_date_m", $this->death_date_m);
            $stmt->bindParam(":death_date_y", $this->death_date_y);
            $stmt->bindParam(":is_alive", $this->is_alive);
            $stmt->bindParam(":death_reason", $this->death_reason);
            $stmt->bindParam(":arrival_date_d", $this->arrival_date_d);
            $stmt->bindParam(":arrival_date_m", $this->arrival_date_m);
            $stmt->bindParam(":arrival_date_y", $this->arrival_date_y);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":created", $this->created);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteRat(){
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

