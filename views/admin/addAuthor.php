<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="votre_page_de_traitement.php" method="POST" enctype="multipart/form-data">
    <div class="mb-4">
        <label for="nom" class="block text-gray-700 font-bold mb-2">Nom:</label>
        <input type="text" name="nom" id="nom" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
    </div>
    <div class="mb-4">
        <label for="prenom" class="block text-gray-700 font-bold mb-2">Prénom:</label>
        <input type="text" name="prenom" id="prenom" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
    </div>
    <div class="mb-4">
        <label for="date_de_naissance" class="block text-gray-700 font-bold mb-2">Date de Naissance:</label>
        <input type="date" name="date_de_naissance" id="date_de_naissance" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
    </div>
    <div class="mb-4">
        <label for="nationalite" class="block text-gray-700 font-bold mb-2">Nationalité:</label>
        <input type="text" name="nationalite" id="nationalite" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
    </div>
    <div class="mb-4">
        <label for="biographie" class="block text-gray-700 font-bold mb-2">Biographie:</label>
        <textarea name="biographie" id="biographie" rows="5" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required></textarea>
    </div>
    <div class="mb-4">
        <label for="image" class="block text-gray-700 font-bold mb-2">Image:</label>
        <input type="file" name="image" id="image" class="w-full" accept="image/*" required>
    </div>
    <div class="mt-6">
        <button type="submit" name="submit-a" class="bg-blue-600 hover:bg-blue-500 text-white font-semibold py-2 px-4 rounded-full">Ajouter Author</button>
    </div>
</form>

</body>
</html>