<?php

final class FightController
{
    private Hero $hero;
    private Monster $monster;
    private HeroRepository $heroRepository;


    public function __construct(Hero $hero, Monster $monster)
    {
        $this->hero = $hero;
        $this->monster = $monster;
        $this->heroRepository = new HeroRepository();
    }


    public function handleRequest(): void
    {
        // TODO: Implement the fight logic
        $input = json_decode(file_get_contents('php://input'), true);
        $action = $input['action'] ?? '';


        switch ($action) {
            case 'attack':
                $response = $this->handleAttack();

                if ($this->hero->getHealth() <= 0) {
                    $action = 'defeat';
                    $reponse = $this->handleDefeat();
                }

                if ($this->monster->getHealth() <= 0) {
                    $action = 'victory';
                    $response = $this->handleVictory();
                }

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


    private function handleAttack(): string
    {
        $response = '';

        // Empecher le combat si l'un des deux personnages est mort
        if ($this->hero->getHealth() <= 0 || $this->monster->getHealth() <= 0) {
            return 'Le combat est terminé';
        }

        $this->hero->hit($this->monster);
        $this->monster->hit($this->hero);

        $response = "{$this->hero->getName()} attaque {$this->monster->getName()}\n";
        $response .= "{$this->hero->getName()} a infligé {$this->hero->getAttack()} points de dégâts à {$this->monster->getName()}\n";
        $response .= "{$this->monster->getName()} attaque {$this->hero->getName()}\n";
        $response .= "{$this->monster->getName()} a infligé {$this->monster->getAttack()} points de dégâts à {$this->hero->getName()}";

        return $response;
    }

    private function handleVictory(): string
    {
        // TODO: Implement the victory logic
        $_SESSION['result'] = 'victory';
        $this->heroRepository->update($this->hero);
        return 'Victory';
    }

    private function handleDefeat(): string
    {
        // TODO: Implement the defeat logic
        $_SESSION['result'] = 'defeat';
        $this->heroRepository->delete($this->hero);
        return 'Defeat';
    }
}
