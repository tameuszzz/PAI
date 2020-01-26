<?php
class User {
    private $id;
    private $email;
    private $name;
    private $gender;
    private $age;
    private $id_town;
    private $id_role;
    private $description;
    private $photo;
    private $gameType;

    public function __construct(
        string $email,
        string $password,
        string $name,
        string $gender,
        string $age,
        string $town,
        int $id_role,
        int $id = null,
        string $description = "",
        string $photo = "",
        int $gameType = 0
    ){
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->gender = $gender;
        $this->age = $age;
        $this->town = $town;
        $this->id_role = $id_role;
        $this->description = $description;
        $this->photo = $photo;
        $this->gameType = $gameType;
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

    public function getTown(): string {
        return $this->town;
    }

    public function getRole(): int {
        return $this->id_role;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getPhoto(): string {
        return $this->photo;
    }

    public function getGameType(): int {
        return $this->gameType;
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

    public function setId_town($id_town): void {
        $this->id_town = $id_town;
    }

    public function setRole($id_role): void {
        $this->id_role = $id_role;
    }

    public function setDescription($description): void {
        $this->description = $description;
    }

    public function setPhoto($photo): void {
        $this->photo = $photo;
    }

    public function setGameType($gameType): void {
        $this->gameType = $gameType;
    }
}
