<?php
// require_once '../utils/autoloader.php';


session_start();

session_destroy();

var_dump($_SESSION);
