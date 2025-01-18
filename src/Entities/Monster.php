<?php

final class Monster extends Character
{
    public function __construct(int $id, string $name = "", int $health = 100, int $healthMax = 100)
    {
        parent::__construct($id, $name, $health, $healthMax);
    }
}