<?php

final class Hero
{
    private int $id;
    private string $name;
    private string $gender;
    private int $health;
    private string $picturePath;

    public function __construct(int $id, string $name = "", string $gender = "Male", int $health = 100)
    {
        $this->id = $id;
        $this->name = $name;
        $this->health = $health;
        $this->gender = $gender;
        if ($gender === "Male") {
            $this->picturePath = "/public/assets/imgs/lambda-hero.gif";
        } else {
            $this->picturePath = "/public/assets/imgs/lambda-heroin.gif";
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getGender(): string
    {
        return $this->gender;
    }


    /**
     * Get the value of picturePath
     */
    public function getPicturePath()
    {
        return $this->picturePath;
    }
}
