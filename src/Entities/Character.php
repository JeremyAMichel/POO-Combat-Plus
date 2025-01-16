<?php

abstract class Character implements AttackableContract
{
    use AttackableTrait;
    protected int $id;
    protected string $name;
    

    public function __construct(int $id, string $name = "", int $health = 100)
    {
        $this->id = $id;
        $this->name = $name;
        $this->health = $health;
    }

    
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function hit(AttackableContract $target): void
    {
        $target->setHealth($target->getHealth() - 15);
    }

 
}