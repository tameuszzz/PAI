<?php

require_once 'AppController.php';
require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '//..//Models//Game.php';
require_once __DIR__ . '//..//Repository//GameRepository.php';

class GameController extends AppController {

    public function loadMyGames() {
        if (isset($_SESSION['id'])) {

            $gameRepo = new GameRepository();

            header('Content-type: application/json');
            http_response_code(200);

            echo $gameRepo->getMyGames($_SESSION['id']) ? json_encode($gameRepo->getMyGames($_SESSION['id'])) : '';

        }
        else {
            $url = "http://$_SERVER[HTTP_HOST]/PAI/";
            header("Location: {$url}?page=login");
        }
    }

    public function gameDelete(): void
    {

        if (!isset($_POST['id_game'])) {
            http_response_code(404);
            return;
        }

        $game = new GameRepository();
        $game->deleteGame($_POST['id_game']);
        http_response_code(200);

    }

}
