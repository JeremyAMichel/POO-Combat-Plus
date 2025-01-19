<?php

require_once '../utils/autoloader.php';

session_start();



if (!isset($_SESSION['hero']) || !isset($_SESSION['monster']) || !isset($_SESSION['result'])) {
    header('Location: /public/choice-hero.php');
    exit;
}

/**
 * @var Hero $hero
 */
$hero = $_SESSION['hero'];

/**
 * @var Monster $monster
 */
$monster = $_SESSION['monster'];

/**
 * @var string $result
 */
$result = $_SESSION['result'];

require_once './partials/header.php';

?>

<main class="container mx-auto p-4 flex justify-center items-center min-h-screen">
    <div id="fight" class="text-center mb-8 w-full">
        <h1 class="text-5xl font-bold text-white mb-8 <?php if ($result !== "fighting") echo "hidden" ?>">Fight</h1>
        <?php if ($result === "fighting"): ?>
            <div id="fight-screen" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <article class="bg-gray-800 shadow-md rounded-lg overflow-hidden transform transition duration-500 p-4 relative">

                    <img src="<?php echo htmlspecialchars($hero->getPicturePath()); ?>" alt="<?php echo htmlspecialchars($hero->getName()); ?>" class="w-full h-48 object-contain mb-4 border-4 border-yellow-600 rounded-sm shadow-lg">

                    <div class="p-4">
                        <h2 class="text-xl font-bold mb-4 text-white">🦸 <?php echo htmlspecialchars($hero->getName()); ?></h2>
                        <div class="flex justify-evenly mb-4">
                            <p class="text-gray-400">❤️ <span id="hero-health"><?php echo htmlspecialchars($hero->getHealth()); ?></span>/<?php echo htmlspecialchars($hero->getHealthMax()); ?></p>
                            <p class="text-gray-400">⚔️ <?php echo htmlspecialchars($hero->getAttack()); ?></p>
                            <p class="text-gray-400">🛡️ <?php echo htmlspecialchars($hero->getDefense()); ?></p>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2.5 mb-8">
                            <div id="hero-healthBar" class="bg-green-500 h-2.5 rounded-full transition-all" style="width: <?php echo htmlspecialchars($hero->getHealth() / $hero->getHealthMax() * 100); ?>%"></div>
                        </div>
                    </div>
                </article>
                <div class="flex items-center justify-center">
                    <h2 class="text-9xl font-bold text-white">VS</h2>
                </div>
                <article class="bg-gray-800 shadow-md rounded-lg overflow-hidden transform transition duration-500 p-4 relative">
                    <img src="<?= htmlspecialchars($monster->getPicturePath())  ?>" alt="<?php echo htmlspecialchars($monster->getName()); ?>" class="w-full h-48 object-contain mb-4 border-4 border-yellow-600 rounded-sm shadow-lg">
                    <div class="p-4">
                        <h2 class="text-xl font-bold mb-4 text-white">👾 <?= htmlspecialchars($monster->getName()); ?></h2>
                        <div class="flex justify-evenly mb-4">
                            <p class="text-gray-400">❤️ <span id="monster-health"><?= htmlspecialchars($monster->getHealth()); ?></span>/<?= htmlspecialchars($monster->getHealthMax()); ?></p>
                            <p class="text-gray-400">⚔️ <?= htmlspecialchars($monster->getAttack()); ?></p>
                            <p class="text-gray-400">🛡️ <?= htmlspecialchars($monster->getDefense()); ?></p>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2.5 mb-8">
                            <div id="monster-healthBar" class="bg-red-500 h-2.5 rounded-full transition-all" style="width: <?php echo htmlspecialchars($monster->getHealth() / $monster->getHealthMax() * 100) ?>%"></div>
                        </div>
                    </div>
                </article>
            </div>
            <div id=attacks class="text-center mt-8 grid grid-cols-2 gap-4 w-full">
                <button id="attack" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300">Attack 1</button>
                <button id="attack2" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300">Attack 2</button>
                <button id="attack3" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300">Attack 3</button>
                <button id="attack4" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300">Attack 4</button>
            </div>
        <?php elseif ($result === "victory"): ?>
            <div class="flex items-center justify-center flex-col relative">
                <img src="./assets/imgs/victory.png" alt="victory" class="w-1/2">
                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300 mt-4 absolute 
                bottom-32" onclick="window.location.href = '/public/choice-hero.php'">
                    Continue
                </button>
            </div>
        <?php elseif ($result === "defeat"): ?>
            <div class="flex items-center justify-center flex-col relative">
                <img src="./assets/imgs/defeat.webp" alt="victory" class="w-1/2">
                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300 mt-4 absolute 
                bottom-56" onclick="window.location.href = '/public/choice-hero.php'">
                    Continue
                </button>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php if ($result === "fighting"): ?>
    <script src="./assets/scripts/fight.js"></script>
<?php endif; ?>

<?php

require_once './partials/footer.php';

?>