<?php

    class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $conn;


    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->servername . ';dbname=doktordb', $this->username, $this->password);
            $this->conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        
        }
        catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $this->conn;
    }

    }






?>