<?php

trait AttackableTrait
{
    protected int $health;
    protected int $healthMax;
    protected int $defense;

    public function getHealth(): int
    {
        return $this->health;
    }

    public function setHealth(int $health): self
    {
        $this->health = $health;
        return $this;
    }

    /**
     * Get the value of healthMax
     */ 
    public function getHealthMax(): int
    {
        return $this->healthMax;
    }

    /**
     * Set the value of healthMax
     *
     * @return  self
     */ 
    public function setHealthMax($healthMax): self
    {
        $this->healthMax = $healthMax;

        return $this;
    }

    /**
     * Get the value of defense
     */ 
    public function getDefense(): int
    {
        return $this->defense;
    }

    /**
     * Set the value of defense
     *
     * @return  self
     */ 
    public function setDefense($defense): self
    {
        $this->defense = $defense;

        return $this;
    }
}
