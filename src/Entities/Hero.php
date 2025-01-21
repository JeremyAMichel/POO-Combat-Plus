<?php

final class Hero extends Character
{
    private int $id;
    private string $gender;


    public function __construct(int $id, string $name = "", string $gender = "Male", int $health = 100, int $healthMax = 100, int $attack = 15, int $defense = 3)
    {
        parent::__construct($name, $health, $healthMax, $attack, $defense);

        $this->id = $id;
        $this->gender = $gender;

        if ($gender === "Male") {
            $this->picturePath = "./assets/imgs/lambda-hero.gif";
        } else {
            $this->picturePath = "./assets/imgs/lambda-heroin.gif";
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    
}
