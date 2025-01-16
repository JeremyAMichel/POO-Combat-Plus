<?php

interface AttackableContract
{
    public function getHealth(): int;
    public function setHealth(int $health): void;
}