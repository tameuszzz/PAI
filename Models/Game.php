<?php

class Game {

    private $id_game;
    private $user_id;
    private $name;
    private $gameType_id;
    private $playersMin;
    private $playersMax;
    private $description;
    private $difficulty_id;
    private $gameimg;

    public function __construct(
        string $name,
        int $playersMin,
        int $playersMax,
        string $description = "",
        string $gameimg = "",
        int $id_game = null,
        int $user_id = null,
        int $gameType_id = null,
        int $difficulty_id = null
    ){
        $this->$name = $name;
        $this->playersMin = $playersMin;
        $this->playersMax = $playersMax;
        $this->description = $description;
        $this->gameimg = $gameimg;
        $this->id_game = $id_game;
        $this->user_id = $user_id;
        $this->gameType_id = $gameType_id;
        $this->difficulty_id = $difficulty_id;
    }

    //getery
    public function getId_game(): int {
        return $this->id_game;
    }
    public function getUser_id(): int {
        return $this->user_id;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getGameType_id(): int {
        return $this->gameType_id;
    }
    public function getPlayersMin(): int {
        return $this->playersMin;
    }
    public function getPlayersMax(): int {
        return $this->playersMax;
    }
    public function getDescription(): string {
        return $this->description;
    }
    public function getDifficulty_id(): int {
        return $this->difficulty_id;
    }
    public function getGameimg_id(): int {
        return $this->gameimg;
    }

    // setery
    public function setId_game(): viod {
        return $this->id_game;
    }
    public function setUser_id(): viod {
        return $this->user_id;
    }
    public function setName($name): void {
        $this->name = $name;
    }
    public function setGameType_id(): viod {
        return $this->gameType_id;
    }
    public function setPlayersMin(): viod {
        return $this->playersMin;
    }
    public function setPlayersMax(): viod {
        return $this->playersMax;
    }
    public function setDescription(): viod {
        return $this->description;
    }
    public function setDifficulty_id(): viod {
        return $this->difficulty_id;
    }
    public function setGameimg_id(): viod {
        return $this->gameimg;
    }
}
