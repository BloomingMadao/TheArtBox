<?php
 include('bdd.php');
 include('header.php');
$postData = $_POST;

/** On vérifie que tous les champs sont présents, non vides et que la description fait au moins 3 caractères. 
 * Si ce n'est pas le cas, on affiche un message d'erreur et on arrête le script.
 */
if (
    !isset($postData['title']) ||
    !isset($postData['author']) ||
    !isset($postData['img']) ||
    !isset($postData['description']) ||
    empty($postData['title']) ||
    empty($postData['author']) ||
    empty($postData['img']) ||
    empty($postData['description']) ||
    strlen($postData['description']) < 3 ||
    !filter_var($postData['img'], FILTER_VALIDATE_URL)
    ){
        echo 'Tous les champs sont obligatoires et la description doit faire au moins 3 caractères.';
        return;
    }
    else {
        $author = htmlspecialchars($postData['author']);
        $title = htmlspecialchars($postData['title']);
        $img = htmlspecialchars($postData['img']);
        $description = htmlspecialchars($postData['description']);

        $mysqlClient = connexion();
        $insertStatement = $mysqlClient->prepare("INSERT INTO oeuvres (title, author, img, description) VALUES (:title, :author, :img, :description)");
        $insertStatement->execute([
            'title' => $title,
            'author' => $author,
            'img' => $img,
            'description' => $description
        ]);
        header('Location: oeuvre.php?id=' . $mysqlClient->lastInsertId());
    }

?>

<?php include('footer.php'); ?>


