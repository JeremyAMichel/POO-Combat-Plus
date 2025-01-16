<?php

interface AttackableInterface
{
    public function getHealth(): int;
    public function setHealth(int $health): void;
}