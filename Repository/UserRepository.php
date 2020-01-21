<?php

require_once 'Repository.php';
require_once 'Models/User.php';

class UserRepository extends Repository {

    public function getUser(string $email): ?User {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user WHERE email=:email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }
        return new User(
            $user['email'],
            $user['pwd'],
            $user['name'],
            $user['gender'],
            $user['age'],
            $user['gameType'],
        );

    }

    public function isEmailAvailable($email): bool {
        $pdo = $this->database->connect();
        try {
            $stmt = $pdo->prepare("SELECT email FROM user WHERE email=:email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $countEmail = $stmt->rowCount();
            $pdo = null;
            return ($countEmail > 0) ? false : true;
        } catch (PDOException $e) {
            echo "Błąd z bazą danych. Za utrudnienia przepraszamy.";
            die();
        }
    }

    public function isUserRegistered($email, $password): bool {

        $pdo = $this->database->connect();

        try {

            $stmt = $pdo->prepare("SELECT * FROM user WHERE email=:email and pwd=:password");

            $stmt->bindParam(":email", $email, PDO::PARAM_STR);

            $password = md5($password);
            $stmt->bindParam(":password", $password, PDO::PARAM_STR);

            $stmt->execute();

            $countUser = $stmt->rowCount();
            $pdo = null;

            return ($countUser == 1) ? true : false;
        } catch (PDOException $e) {
            echo "Błąd z bazą danych. Za utrudnienia przepraszamy.";
            die();
        }
    }

    public function addUser($email, $password, $name, $gender, $age, $gameType): void {
        $pdo = $this->database->connect();
        try {
            $stmt = $pdo->prepare("INSERT INTO user(id_role, name, email, pwd, gender, age, gameType) VALUES (1, :name, :email, :password, :gender, :age, :gameType)");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
            $stmt->bindParam(':age', $age, PDO::PARAM_STR);
            $stmt->bindParam(':gameType', $gameType, PDO::PARAM_STR);
            $stmt->execute();
            $pdo = null;
        } catch (PDOException $e) {
            echo "Błąd z bazą danych. Za utrudnienia przepraszamy.";
            die();
        }
    }

    public function getUsers(): array {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user
        ');
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            $result[] = new User(
                $user['email'],
                $user['password'],
                $user['name'],
                $user['gender'],
                $user['age'],
                $user['gameType'],
            );
        }

        return $result;
    }

}
