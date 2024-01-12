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
        <form action="../../app/controller/WikiController.php" method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="titre" class="block text-gray-700 font-bold mb-2">Titre:</label>
                <input type="text" name="titre" id="titre" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                <input type="text" name="description" id="description" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="contenu" class="block text-gray-700 font-bold mb-2">Contenu:</label>
                <textarea name="contenu" id="contenu" rows="5" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">Image:</label>
                <input type="file" name="image" id="image" class="w-full" accept="image/*" required>
            </div>
            <div class="mb-4">
                <label for="categorie_id" class="block text-gray-700 font-bold mb-2">Catégorie:</label>
                <select name="categorie_id" id="categorie_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                    <!-- Options pour les catégories -->
                    <option value="1">Catégorie 1</option>
                    <option value="2">Catégorie 2</option>
                    <!-- Ajoutez plus d'options au besoin -->
                </select>
            </div>
            <div class="mb-4">
                <label for="tag_id" class="block text-gray-700 font-bold mb-2">Tag:</label>
                <input type="text" name="tag_id" id="tag_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mt-6">
                <button type="submit" name="submit-w" class="bg-blue-600 hover:bg-blue-500 text-white font-semibold py-2 px-4 rounded-full">Ajouter Wiki</button>
            </div>
        </form>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>

</html>