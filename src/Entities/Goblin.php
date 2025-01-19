<?php 

final class Goblin extends Monster
{
    public function __construct(string $name = "Goblin", int $health = 60, int $healthMax = 60, int $attack = 5, int $defense = 2)
    {
        parent::__construct($name, $health, $healthMax, $attack, $defense);
        $this->picturePath = "/public/assets/imgs/goblin.gif";
    }
}