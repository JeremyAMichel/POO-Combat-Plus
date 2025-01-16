<?php

require_once '../utils/autoloader.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../index.php');
    return;
}


?>

<?php


// input sanitization
$pseudo = htmlspecialchars(trim($_POST['pseudo']));

