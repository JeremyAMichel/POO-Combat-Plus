<?php

require_once '../utils/autoloader.php';

$heroRepository = new HeroRepository();
$hero = new Hero(0, $_POST['name'], $_POST['gender']);
$heroRepository->create($hero);

header("Location: /public/choice-hero.php");

?>