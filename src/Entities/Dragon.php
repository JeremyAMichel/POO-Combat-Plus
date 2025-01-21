<?php 

final class Dragon extends Monster
{
    public function __construct(string $name = "Dragon", int $health = 200, int $healthMax = 200, int $attack = 20, int $defense = 10)
    {
        parent::__construct($name, $health, $healthMax, $attack, $defense);
        $this->picturePath = "./assets/imgs/dragon.gif";
    }
}