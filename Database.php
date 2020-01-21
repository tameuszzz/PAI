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
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        }
        catch(PDOException $e) {
            echo "Błąd połączenia z bazą danych. Za utrudnienia przepraszamy. (Database) ";
            die();
        }
    }
    public function isUserRegistered($email, $password) {
        $connection = $this->connect();
        $result = $connection->query("SELECT * FROM user WHERE email='$email' AND pwd='$password'");
        // $connection->close();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        // return ($row == 1) ? true : false;
        return $row;
    }
    public function isEmailAvailable($email) {
        $connection = $this->connect();
        $result = $connection->query("SELECT email FROM user WHERE email='$email'");
        // $connection->close();
        return ($result->num_rows == 0) ? true : false;
    }
    public function addUser($email, $password, $name, $gender, $age, $gameType) {
        $connection = $this->connect();
        if (!$connection->query("INSERT INTO user(id_role, name, email, pwd, gender, age, gameType) VALUES (1, '$name', '$email', '$password', '$gender', '$age', '$gameType')")) {
            die("Error: $connection->errno");
        }
        // $connection->close();
    }
}
