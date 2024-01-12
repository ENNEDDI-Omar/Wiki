<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Tag</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="px-8 mt-10">
        <div class="flex justify-between items-center">
            <h1 class="mb-4 text-xl font-bold text-gray-700">Tags</h1>
        </div>
        <!-- Formulaire pour ajouter un nouveau tag -->
        <form class="w-full" action="../../app/controller/TagController.php" method="post">
            <div class="flex flex-col">
                <label for="newTag" class="text-gray-700">Nouveau tag :</label>
                <input type="text" name="tag" id="newTag" class="w-full px-3 py-2 mt-1 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500" placeholder="Saisissez le nom du tag" required>
            </div>
            <button type="submit-T" name="addTag" class="px-4 py-2 mt-4 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none">Ajouter</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>