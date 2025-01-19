<?php

interface AttackableContract
{
    public function getHealth(): int;
    public function setHealth(int $health): AttackableContract;

    public function getHealthMax(): int;
    public function setHealthMax(int $healthMax): AttackableContract;

    public function getDefense(): int;
    public function setDefense(int $defense): AttackableContract;
}