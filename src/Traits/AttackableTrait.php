<?php

trait AttackableTrait
{
    protected int $health;
    protected int $healthMax;

    public function getHealth(): int
    {
        return $this->health;
    }

    public function setHealth(int $health): void
    {
        $this->health = $health;
    }

    /**
     * Get the value of healthMax
     */ 
    public function getHealthMax()
    {
        return $this->healthMax;
    }

    /**
     * Set the value of healthMax
     *
     * @return  self
     */ 
    public function setHealthMax($healthMax)
    {
        $this->healthMax = $healthMax;

        return $this;
    }
}
