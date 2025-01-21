<?php
require_once '../utils/autoloader.php';
session_start();

if(!$_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: ../public/fight.php');
    exit;
}

if (!isset($_SESSION['hero']) || !isset($_SESSION['monster'])) {
    header('Location: ../public/fight.php');
    exit;
}

$fightController = new FightController($_SESSION['hero'], $_SESSION['monster']);
$fightController->handleRequest();