<?php
require_once 'connect.php';

class Database {
    private $host;
    private $user;
    private $password;
    private $dbname;
    public function __construct()
    {
        $this->host = HOST;
        $this->user = USER;
        $this->password = PASSWORD;
        $this->dbname = DBNAME;
    }
    public function connect() {
        try {
            $connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);

            // set the PDO error mode to exception
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $connection;
        }
        catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

}
