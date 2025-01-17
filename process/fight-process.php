<?php
require_once '../utils/autoloader.php';
session_start();

if(!$_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: /public/fight.php');
    exit;
}

if (!isset($_SESSION['hero'])) {
    header('Location: /public/fight.php');
    exit;
}

$fightController = new FightController();

// TODO: Implement the fight logic



