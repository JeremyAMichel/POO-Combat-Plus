<?php

final class Hero
{
    private int $id;
    private string $name;
    private int $health;

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

    public function getHealth(): int
    {
        return $this->health;
    }

}