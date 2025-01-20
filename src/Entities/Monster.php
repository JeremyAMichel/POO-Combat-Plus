<?php

abstract class Monster extends Character
{
    public function __construct(string $name, int $health, int $healthMax, int $attack, int $defense)
    {
        parent::__construct($name, $health, $healthMax, $attack, $defense);
    }
}
