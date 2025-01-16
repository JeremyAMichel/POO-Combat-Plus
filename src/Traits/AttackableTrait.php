<?php

trait AttackableTrait
{
    protected int $health;

    public function getHealth(): int
    {
        return $this->health;
    }

    public function setHealth(int $health): void
    {
        $this->health = $health;
    }
}   