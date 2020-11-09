<?php 
    class Database {
        private $host = "d84116.mysql.zonevs.eu";
        private $database_name = "d84116_warraxrat";
        private $username = "d84116sa334290";
        private $password = "883i0A6&vbTIp&A2QyYD";

        public $conn;

        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }  
?>