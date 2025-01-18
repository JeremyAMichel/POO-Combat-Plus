<?php

final class FightController
{
    private Hero $hero;
    private Monster $monster;


    public function __construct(Hero $hero, Monster $monster)
    {
        $this->hero = $hero;
        $this->monster = $monster;
    }


    public function handleRequest(): void
    {
        // TODO: Implement the fight logic
        $input = json_decode(file_get_contents('php://input'), true);
        $action = $input['action'] ?? '';
        $response = '';

        switch ($action) {
            case 'attack':
                $this->hero->hit($this->monster);
                $this->monster->hit($this->hero);
                $response = "{$this->hero->getName()} attaque {$this->monster->getName()}\n";
                $response .= "{$this->hero->getName()} a infligé 15 points de dégâts à {$this->monster->getName()}\n";
                $response .= "{$this->monster->getName()} attaque {$this->hero->getName()}\n";
                $response .= "{$this->monster->getName()} a infligé 10 points de dégâts à {$this->hero->getName()}";
                break;
            default:
                $response = 'Action non reconnue';
                break;
        }

        echo json_encode(['message' => $response, 'action' => $action, 'state' => [
            'hero' => [
                'name' => $this->hero->getName(),
                'health' => $this->hero->getHealth(),
                'healthBar' => $this->hero->getHealth() / $this->hero->getHealthMax() * 100
            ],
            'monster' => [
                'name' => $this->monster->getName(),
                'health' => $this->monster->getHealth(),
                'healthBar' => $this->monster->getHealth() / $this->monster->getHealthMax() * 100
            ]
        ]]);
    }
}
