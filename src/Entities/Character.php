<?php

abstract class Character implements AttackableContract
{
    use AttackableTrait;
    protected int $id;
    protected string $name;
    protected int $attack;


    public function __construct(int $id, string $name = "", int $health = 100, int $healthMax = 100, int $attack = 15)
    {
        $this->id = $id;
        $this->name = $name;
        $this->health = $health;
        $this->healthMax = $healthMax;
        $this->attack = $attack;
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
        // Si la cible a moins de 15 points de vie, on lui met 0 pour pas avoir de nombre negatif
        if ($target->getHealth() - $this->attack <= 0) {
            $target->setHealth(0);
        } else {
            $target->setHealth($target->getHealth() - $this->attack );
        }
    }
}
