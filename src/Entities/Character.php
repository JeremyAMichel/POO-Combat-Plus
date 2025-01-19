<?php

abstract class Character implements AttackableContract
{
    use AttackableTrait;
    protected int $id;
    protected string $name;
    protected int $attack;


    public function __construct(int $id, string $name = "", int $health = 100, int $healthMax = 100, int $attack = 15, int $defense = 3)
    {
        $this->id = $id;
        $this->name = $name;
        $this->health = $health;
        $this->healthMax = $healthMax;
        $this->attack = $attack;
        $this->defense = $defense;
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAttack(): int
    {
        return $this->attack;
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
