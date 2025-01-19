<?php

require_once '../utils/autoloader.php';

$heroRepository = new HeroRepository();
$heroes = $heroRepository->findAll();

if (!$heroes) {
    header("Location: ./create-hero.php");
    exit;
}

require_once './partials/header.php';


?>

<main class="container mx-auto p-4">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-white">Choose Your Hero</h1>
        <div class="text-center mt-8">
            <a href="create-hero.php" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 transition duration-300">Create a New Hero</a>
        </div>
    </div>
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        <?php foreach ($heroes as $hero): ?>
            <article class="bg-gray-800 shadow-md rounded-lg overflow-hidden transform transition duration-500 p-10 relative">

                <img src="<?= htmlspecialchars($hero->getPicturePath()); ?>" alt="<?= htmlspecialchars($hero->getName()); ?>" class="w-full h-48 object-contain border-4 border-yellow-600 mb-4 rounded-sm shadow-lg">

                <div>
                    <h2 class="text-xl font-bold mb-4 text-white">🦸 <?= htmlspecialchars($hero->getName()); ?></h2>
                    <div class="flex justify-between mb-4">
                        <p class="text-gray-400">❤️ <?= htmlspecialchars($hero->getHealth()); ?>/<?= htmlspecialchars($hero->getHealthMax()); ?></p>
                        <p class="text-gray-400">⚔️ <?= htmlspecialchars($hero->getAttack()); ?></p>
                        <p class="text-gray-400">🛡️ <?= htmlspecialchars($hero->getDefense()); ?></p>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-2.5 mb-8">
                        <div class="bg-green-500 h-2.5 rounded-full" style="width: <?= htmlspecialchars($hero->getHealth()); ?>%"></div>
                    </div>
                    <form action="../process/choice-hero-process.php" method="post" class="flex justify-center">
                        <input type="hidden" name="hero_id" value="<?= htmlspecialchars($hero->getId()); ?>">
                        <button type="submit" class="bg-blue-500 text-white w-24 px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Play</button>
                    </form>
                </div>
                <form action="../process/delete-hero-process.php" method="post" class="absolute top-2 right-2">
                    <input type="hidden" name="hero_id" value="<?= htmlspecialchars($hero->getId()); ?>">
                    <button type="submit" class="text-red-500 hover:text-red-700 transition duration-300">🗑️</button>
                </form>
            </article>
        <?php endforeach; ?>
    </section>

</main>





<?php

require_once './partials/footer.php';

?>