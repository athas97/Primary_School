<?php

class PersistanceManager {

    private $mysqli;
    private $dbHost = 'localhost';
    private $dbUserName = 'eshoppe4_athas';
    private $dbPassword = 'Athas_123';
    private $dbName = 'eshoppe4_zps';

    public function __construct() {
        try {
            //echo "<br>connecting...</br>";
            $this->mysqli = new mysqli($this->dbHost, $this->dbUserName, $this->dbPassword, $this->dbName);
        } catch (mysqli_sql_exception $e) {
            echo $e->getMessage();
        }
    }

    public function getCount($query) {
        $assocArray = $this->mysqli->query($query)->fetch_assoc();
        if ($this->mysqli->errno) {
            die("MySQL database query failed: " . $this->mysqli->error);
        }
        return $assocArray['c'];
    }

    public function fetchResult($query) {
        $result = $this->mysqli->query($query);
        if ($this->mysqli->errno) {
            die("MySQL database query failed: " . $this->mysqli->error);
        }
        $resultArray = array();
        while ($row = $result->fetch_assoc()) {
            $resultArray[] = $row;
        }
        return $resultArray;
    }

    public function executeQuery($query) {
        $result = $this->mysqli->query($query);
        if ($this->mysqli->errno) {
            die("MySQL database query failed: " . $this->mysqli->error);
        }
        return $this->mysqli->insert_id;
        //return $result;
    }

}

?>