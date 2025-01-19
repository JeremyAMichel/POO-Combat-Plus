<?php

require_once '../utils/autoloader.php';

// TODO Use validators !!
$validator = new ValidatorService();

$validator->checkMethods('POST');

$validator->addStrategy('hero_id', new RequiredValidator());
$validator->addStrategy('hero_id', new IntegerValidator());

if (!$validator->validate($_POST)) {
    header('Location: ../public/choice-hero.php');
    return;
}

$sanitizedData = $validator->sanitize($_POST);

$heroRepository = new HeroRepository();
$hero = $heroRepository->findById($sanitizedData['hero_id']);

session_start();

$_SESSION['hero'] = $hero;
$_SESSION['monster'] = new Monster(0, 'Monster', 80, 80);
$_SESSION['result'] = "fighting";

header("Location: /public/fight.php");
