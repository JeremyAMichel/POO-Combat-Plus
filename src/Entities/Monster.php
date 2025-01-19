<?php

abstract class Monster extends Character
{
    public function __construct(string $name = "", int $health = 100, int $healthMax = 100, int $attack = 15, int $defense = 3)
    {
        parent::__construct($name, $health, $healthMax, $attack, $defense);
    }
}