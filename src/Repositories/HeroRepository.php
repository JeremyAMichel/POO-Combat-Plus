<?php

final class HeroRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll(): array
    {
        $sql = 'SELECT * FROM hero';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $heroData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $heroes = [];

        foreach ($heroData as $hero) {
            $heroes[] = HeroMapper::MapToObject($hero);
        }

        return $heroes;
    }

    public function findById(int $id): Hero
    {
        $sql = 'SELECT * FROM hero WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $heroData = $stmt->fetch(PDO::FETCH_ASSOC);

        return HeroMapper::MapToObject($heroData);
    }

    public function create(Hero $hero): void
    {
        $sql = 'INSERT INTO `hero`(`name`, `health`, `gender`, `picture_path`) VALUES (:name, :health, :gender, :picture_path)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':name' => $hero->getName(),
            ':health' => $hero->getHealth(),
            ':gender' => $hero->getGender(),
            ':picture_path' => $hero->getPicturePath()
        ]);
    }

    public function delete(int $id): void
    {
        $sql = 'DELETE FROM hero WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}
