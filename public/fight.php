<?php

require_once '../utils/autoloader.php';

session_start();

if (!isset($_SESSION['hero']) || !isset($_SESSION['monster'])) {
    header('Location: /public/choice-hero.php');
    exit;
}

/**
 * @var Hero $hero
 */
$hero = $_SESSION['hero'];
$monster = $_SESSION['monster'];

require_once './partials/header.php';

?>

<main class="container mx-auto p-4 flex justify-center items-center min-h-screen">
    <div class="text-center mb-8 w-full">
        <h1 class="text-3xl font-bold text-white mb-8">Combat</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <article class="bg-gray-800 shadow-md rounded-lg overflow-hidden transform transition duration-500 p-4 relative">
                <img src="<?php echo htmlspecialchars($hero->getPicturePath()); ?>" alt="<?php echo htmlspecialchars($hero->getName()); ?>" class="w-full h-48 object-contain mb-4">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-4 text-white">🦸 <?php echo htmlspecialchars($hero->getName()); ?></h2>
                    <p class="text-gray-400 mb-4">❤️ Health: <span id="hero-health"><?php echo htmlspecialchars($hero->getHealth()); ?></span>/<?php echo htmlspecialchars($hero->getHealth()); ?></p>
                    <div class="w-full bg-gray-700 rounded-full h-2.5 mb-8">
                        <div id="hero-healthBar" class="bg-green-500 h-2.5 rounded-full" style="width: <?php echo htmlspecialchars($hero->getHealth()); ?>%"></div>
                    </div>
                </div>
            </article>
            <article class="bg-gray-800 shadow-md rounded-lg overflow-hidden transform transition duration-500 p-4 relative">
                <img src="/public/assets/imgs/goblin.gif" alt="<?php echo htmlspecialchars($monster->getName()); ?>" class="w-full h-48 object-contain mb-4">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-4 text-white">👾 <?= htmlspecialchars($monster->getName()); ?></h2>
                    <p class="text-gray-400 mb-4">❤️ Health: <span id="monster-health"><?= htmlspecialchars($monster->getHealth()); ?></span></p /<?= htmlspecialchars($monster->getHealth()); ?></p>
                    <div class="w-full bg-gray-700 rounded-full h-2.5 mb-8">
                        <div id="monster-healthBar" class="bg-red-500 h-2.5 rounded-full" style="width: 100%"></div>
                    </div>
                </div>
            </article>
        </div>
        <div class="text-center mt-8">

            <button id="attack" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300">Attack</button>

        </div>
    </div>
</main>

<script src="./assets/scripts/fight.js"></script>

<?php

require_once './partials/footer.php';

?>