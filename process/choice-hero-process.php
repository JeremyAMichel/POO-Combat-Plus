<?php

require_once '../utils/autoloader.php';

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
if (!$hero) {
    header('Location: ../public/choice-hero.php');
    return;
}


$randomNumber = rand(1, 15);

// 1/15 chance to fight a dragon
if ($randomNumber == 1) {
    $monster = new Dragon();
} 
// 5/15 chance to fight an ogre
elseif ($randomNumber <= 6) {
    $monster = new Ogre();
} 
// 9/15 chance to fight a goblin
else {
    $monster = new Goblin();
}

session_start();

$_SESSION['hero'] = $hero;
$_SESSION['monster'] = $monster;
$_SESSION['result'] = "fighting";

// var_dump($_SESSION);

header("Location: ../public/fight.php");
exit;