<?php

require_once 'Repository.php';
require_once __DIR__.'//..//Models//User.php';

class UserRepository extends Repository {

    public function getUser(string $email) {

        $pdo = $this->database->connect();
        try {
            $stmt = $pdo->prepare('
                SELECT * FROM user WHERE email=:email
            ');
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user == false) {
                return null;
            }

            $stmt2 = $pdo->prepare("SELECT * FROM user_details WHERE id = (SELECT id_userdetails FROM user WHERE email=:email)");
            $stmt2->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt2->execute();

            $userInfo = $stmt2->fetch(PDO::FETCH_ASSOC);

            $pdo = null;

            if (is_bool($userInfo)) {
                return new User(
                    $user['email'],
                    $user['pwd'],
                    $user['name'],
                    $user['gender'],
                    $user['age'],
                    $user['gameType']
                );
            }

            return new User(
                $user['email'],
                $user['pwd'],
                $user['name'],
                $user['gender'],
                $user['age'],
                $user['gameType'],
                $userInfo['description'],
                $userInfo['photo']
            );
        } catch (PDOException $e) {
            echo $e->getMessage();
            echo "Błąd z bazą danych. Za utrudnienia przepraszamy.";
            die();
        }

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
            $stmt = $pdo->prepare("INSERT INTO user(id_role, name, email, pwd, gender, age, gameType, id_userdetails) VALUES (1, :name, :email, :password, :gender, :age, :gameType, null)");
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

    public function isPhotoSet($email) {
        $pdo = $this->database->connect();

        try {

            $stmt = $pdo->prepare("SELECT photo FROM user_details WHERE id = (SELECT id_userdetails FROM user WHERE email=:email)");

            $stmt->bindParam(":email", $email, PDO::PARAM_STR);

            $stmt->execute();

            $photo = $stmt->fetch(PDO::FETCH_ASSOC);
            $pdo = null;

            return ($photo['photo'] != "") ? true : false;
        } catch (PDOException $e) {
            echo "Błąd z bazą danych. Za utrudnienia przepraszamy. isPhotoSet";
            die();
        }
    }

    public function addUserDetails($gameType, $description, $photo) {
        $pdo  = $this->database->connect();

        try {

            $stmt = $pdo->prepare("SELECT id_userdetails FROM user WHERE email=:email");
            $stmt->bindParam(':email', $_SESSION['id'], PDO::PARAM_STR);
            $stmt->execute();
            $idUserDetails = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($idUserDetails['id_userdetails'] == null) {
                $stmt = $pdo->prepare("INSERT INTO user_details(description, photo) VALUES (:description, :photo)");
            } else {
                $stmt = $pdo->prepare("UPDATE user_details SET description=:description, photo=:photo WHERE id = (SELECT id_userdetails FROM user WHERE email=:email)");
                $stmt->bindParam(':email', $_SESSION['id'], PDO::PARAM_STR);
            }

            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':photo', $photo, PDO::PARAM_STR);

            $stmt->execute();

            if($idUserDetails['id_userdetails'] == null) {
                $addId = $pdo->prepare("UPDATE user SET id_userdetails=(SELECT MAX(id) FROM user_details) WHERE email=:email");
                $addId->bindParam(':email', $_SESSION['id'], PDO::PARAM_STR);
                $addId->execute();
            }

            $pdo = null;

        } catch (PDOException $e) {
            echo $e->getMessage();
            echo "Błąd z bazą danych. Za utrudnienia przepraszamy. addUserDetails";
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
