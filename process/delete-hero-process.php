<?php

require_once '../utils/autoloader.php';

$validator = new ValidatorService();

$validator->checkMethods('POST');

$validator->addStrategy('hero_id', new RequiredValidator());
$validator->addStrategy('hero_id', new IntegerValidator());

if (!$validator->validate($_POST)) {
    header('location: ../public/create-hero.php');
    return;
}

$sanitizedData = $validator->sanitize($_POST);

$heroRepository = new HeroRepository();
$heroRepository->delete($heroRepository->findById($sanitizedData['hero_id']));

header("Location: /public/choice-hero.php");

?>