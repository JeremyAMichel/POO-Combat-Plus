<?php

require_once '../utils/autoloader.php';

if (!isset($_POST['hero_id'])) {
    header("Location: ./choice-hero.php");
    exit;
}

$heroRepository = new HeroRepository();
$hero = $heroRepository->findById($_POST['hero_id']);

if (!$hero) {
    header("Location: ./choice-hero.php");
    exit;
}

require_once './partials/header.php';


?>

<main class="">

</main>


<?php

require_once './partials/footer.php';

?>