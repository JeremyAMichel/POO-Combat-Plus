<?php

require_once '../utils/autoloader.php';



require_once './partials/header.php';

?>

<main class="min-h-screen flex items-center justify-center">

    <div class="container mx-auto p-6 bg-gray-800 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-white mb-6">Create a Hero</h1>
        <form action="/process/create-hero-process.php" method="post">
            <div class="form-group mb-4">
                <label for="name" class="block text-white text-lg">Hero Name:</label>
                <input type="text" id="name" name="name" class="form-control mt-2 p-2 w-full bg-gray-700 text-white border border-gray-600 rounded" maxlength="30" required>
            </div>
            <div class="form-group mb-4">
                <label for="gender" class="block text-white text-lg">Gender:</label>
                <select id="gender" name="gender" class="form-control mt-2 p-2 w-full bg-gray-700 text-white border border-gray-600 rounded" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Hero</button>
        </form>
    </div>

</main>

<?php

require_once './partials/footer.php';

?>