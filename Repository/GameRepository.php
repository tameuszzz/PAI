<?php

require_once 'Repository.php';
require_once __DIR__.'//..//Models//User.php';
require_once __DIR__.'//..//Models//Game.php';

class GameRepository extends Repository {

    public function addNewGame($gameName, $gameType, $playersMin, $playersMax, $difficulty, $description, $photo): void {
        $pdo = $this->database->connect();
        try {

            $stmt = $pdo->prepare("SELECT id_user FROM user WHERE email=:email");
            $stmt->bindParam(':email', $_SESSION['id'], PDO::PARAM_STR);
            $stmt->execute();
            $userID = $stmt->fetch(PDO::FETCH_ASSOC);
            $id_user = $userID['id_user'];

            $stmt = $pdo->prepare("INSERT INTO game(user_id, name, gameType_id, playersMin, playersMax, description, difficulty_id, gameimg) VALUES (:id_user, :gameName, :gameType, :playersMin, :playersMax, :description, :difficulty, :photo)");

            $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $stmt->bindParam(':gameName', $gameName, PDO::PARAM_STR);
            $stmt->bindParam(':gameType', $gameType, PDO::PARAM_INT);
            $stmt->bindParam(':playersMin', $playersMin, PDO::PARAM_STR);
            $stmt->bindParam(':playersMax', $playersMax, PDO::PARAM_STR);
            $stmt->bindParam(':difficulty', $difficulty, PDO::PARAM_INT);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':photo', $photo, PDO::PARAM_STR);

            $stmt->execute();
            $pdo = null;

        } catch (PDOException $e) {
            echo "Błąd z bazą danych. Za utrudnienia przepraszamy. addNewGame";
            die();
        }
    }

    public function isPhotoSet($email) {
        $pdo = $this->database->connect();

        try {

            $stmt = $pdo->prepare("SELECT gameimg FROM game WHERE user_id = (SELECT id_user FROM user WHERE email=:email)");

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

    public function getMyGames($email): ?array {
        $pdo = $this->database->connect();
        try {
            $stmt = $pdo->prepare("SELECT * FROM game WHERE user_id = (SELECT id_user FROM user WHERE email=:email)");
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();

            $games = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($games === null)
            {
                die("query fail");
                return null;
            }

            // $result = [];
            // foreach ($games as $game) {
            //     $result[] = new Game(
            //         $game['name'],
            //         $game['playersMin'],
            //         $game['playersMax'],
            //         $game['description'],
            //         $game['gameimg'],
            //     );
            // }

            return $games;
        } catch (PDOException $e) {
            echo "Błąd z bazą danych. Za utrudnienia przepraszamy.";
            die();
        }
    }

    public function deleteGame($id_game)
    {
        $pdo = $this->database->connect();
        try {
            $stmt = $pdo->prepare("DELETE from game where game.id_game = :id_game");
            $stmt->bindParam(':id_game', $id_game, PDO::PARAM_INT);
            $stmt->execute();

            $pdo = null;

        } catch (PDOException $e) {
            echo "Database connection error in GameRepositor. ";
            die();
        }

    }

}
