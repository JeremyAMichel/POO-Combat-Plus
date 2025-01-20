<?php

session_start();

session_destroy();

header("Location: ./public/choice-hero.php");
exit;
