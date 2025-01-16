<?php

final class Hero extends Character
{

    private string $gender;
    private string $picturePath;

    public function __construct(int $id, string $name = "", string $gender = "Male", int $health = 100)
    {
        parent::__construct($id, $name, $health);

        $this->gender = $gender;
        
        if ($gender === "Male") {
            $this->picturePath = "/public/assets/imgs/lambda-hero.gif";
        } else {
            $this->picturePath = "/public/assets/imgs/lambda-heroin.gif";
        }
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
