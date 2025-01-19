<?php

abstract class Character implements AttackableContract
{
    use AttackableTrait;
    protected string $name;
    protected int $attack;
    protected string $picturePath;


    public function __construct(string $name = "", int $health = 100, int $healthMax = 100, int $attack = 15, int $defense = 3)
    {
        $this->name = $name;
        $this->health = $health;
        $this->healthMax = $healthMax;
        $this->attack = $attack;
        $this->defense = $defense;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAttack(): int
    {
        return $this->attack;
    }

    /**
     * Get the value of picturePath
     */
    public function getPicturePath(): string
    {
        return $this->picturePath;
    }

    public function hit(AttackableContract $target): void
    {
        $damage = $this->attack - $target->getDefense();

        // Aura moins de 0 de vie après l'attack on lui met 0
        if ($target->getHealth() - $damage <= 0) {
            $target->setHealth(0);
        } else {
            $target->setHealth($target->getHealth() - $damage );
        }
    }
}
