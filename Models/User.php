<?php
class User {
    private $id;
    private $email;
    private $name;
    private $gender;
    private $age;
    private $gameType;
    private $description;
    private $photo;

    public function __construct(
        string $email,
        string $password,
        string $name,
        string $gender,
        string $age,
        string $gameType,
        string $description = "",
        string $photo = "",
        int $id = null
    ){
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->gender = $gender;
        $this->age = $age;
        $this->gameType = $gameType;
        $this->description = $description;
        $this->photo = $photo;
        $this->id = $id;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getGender(): string {
        return $this->gender;
    }

    public function getAge(): string {
        return $this->age;
    }

    public function getGameType(): string {
        return $this->gameType;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setGender($surname): void {
        $this->surname = $gender;
    }

    public function setAge($age): void {
        $this->age = $age;
    }

    public function setGameType($gameType): void {
        $this->leg = $gameType;
    }

    public function setDescription($description): void {
        $this->description = $description;
    }

    public function setPhoto($photo): void {
        $this->photo = $photo;
    }
}
