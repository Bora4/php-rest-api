<?php
    class Doctor {

        private $conn;
        private $table = 'doctors';
        
        public $id;
        public $phonenumber;
        public $name;
        public $surname;
        public $specialty;
        public $hospital;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function get_all() {

            $headers = getallheaders();
            $specialty = $headers['specialty'];
            

            $query = "SELECT * FROM doctors WHERE specialty = ? ";
    
            $stmt = $this->conn->prepare($query);

            // $stmt -> bindParam("s", $specialty);
            $stmt -> bindValue(1, $specialty, PDO::PARAM_STR);


            $stmt->execute();
    
            return $stmt;
    
    
           
           
        }

    }

     

    ?>