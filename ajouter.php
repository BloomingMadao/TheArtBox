<?php require 'header.php'; ?>

<form action="traitement.php" method="POST" enctype="multipart/form-data">
    <div class="champ-formulaire">
        <label for="title">Titre de l'œuvre</label>
        <input type="text" name="title" id="title">
    </div>
    <div class="champ-formulaire">
        <label for="author">Auteur de l'œuvre</label>
        <input type="text" name="author" id="author">
    </div>
    <div class="champ-formulaire">
        <label for="img">Image</label>
        <input type="file" name="img" id="img">
    </div>
    <div class="champ-formulaire">
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
    </div>

    <input type="submit" value="Valider" name="submit">
</form>

<?php require 'footer.php'; ?>