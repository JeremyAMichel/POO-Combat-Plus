<?php

require_once '../utils/autoloader.php';

$validator = new ValidatorService();

$validator->checkMethods('POST');

$validator->addStrategy('name', new RequiredValidator());
$validator->addStrategy('name', new StringValidator(30));
$validator->addStrategy('gender', new RequiredValidator());
$validator->addStrategy('gender', new StringValidator(10));

if (!$validator->validate($_POST)) {
    header('location: ../public/create-hero.php');
    return;
}

$sanitizedData = $validator->sanitize($_POST);

$heroRepository = new HeroRepository();
$hero = new Hero(0, $sanitizedData['name'], $sanitizedData['gender']);
$heroRepository->create($hero);

header("Location: /public/choice-hero.php");

?>