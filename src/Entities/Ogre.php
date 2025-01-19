<?php 

final class Ogre extends Monster
{
    public function __construct(string $name = "Ogre", int $health = 100, int $healthMax = 100, int $attack = 8, int $defense = 4)
    {
        parent::__construct($name, $health, $healthMax, $attack, $defense);
        $this->picturePath = "/public/assets/imgs/ogre.gif";
    }
}