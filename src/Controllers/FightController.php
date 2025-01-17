<?php

final class FightController
{
    private Hero $hero;
    private Monster $monster;

    public function __construct()
    {
        if(!isset($_SESSION['hero'])) 
        {
            throw new Exception('No hero found in session');
        }
        $this->hero = $_SESSION['hero'];

        if(!isset($_SESSION['monster'])) 
        {
            throw new Exception('No monster found in session');
        }
        $this->monster = $_SESSION['monster'];
    }

    public function handleRequest(): void
    {
        // TODO: Implement the fight logic
    }
}