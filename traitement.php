<?php
 include('bdd.php');
 include('header.php');
$postData = $_POST;
$fileData = $_FILES;
$fileInfo = pathinfo($fileData['img']['name']);
$path = './img/';
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
// echo '<pre>';
// print_r($postData);
// print_r($fileData);
// echo '</pre>';


/** On vérifie que tous les champs sont présents, non vides et que la description fait au moins 3 caractères. 
 * Si ce n'est pas le cas, on affiche un message d'erreur et on arrête le script.
 */
if (
    !isset($postData['title']) ||
    !isset($postData['author']) ||
    !isset($postData['description']) ||
    empty($postData['title']) ||
    empty($postData['author']) ||
    empty($postData['description'])  

    ){
        echo 'Tous les champs sont obligatoires et la description doit faire au moins 3 caractères.';
        return;
    }
    else if(!isset($fileData['img']) || 
    $fileData['img']['error'] !== 0 ||
    $fileData['img']['size'] > 5000000 ||
    !in_array($fileInfo['extension'], $allowedExtensions)
    ){
        echo 'Une erreur est survenue lors du téléchargement de l\'image.';
        return;
    }
    else {
        if (!is_dir($path)) {
            header('Location: index.php');
            exit;
        }
        $fullPath = $path . basename($fileData['img']['name']);

        move_uploaded_file($fileData['img']['tmp_name'], $fullPath);
        $author = htmlspecialchars($postData['author']);
        $title = htmlspecialchars($postData['title']);
        $img = htmlspecialchars($fullPath);
        $description = htmlspecialchars($postData['description']);

        $mysqlClient = connexion();
        $insertStatement = $mysqlClient->prepare("INSERT INTO oeuvres (title, author, img, description) VALUES (:title, :author, :img, :description)");
        $insertStatement->execute([
            'title' => $title,
            'author' => $author,
            'img' => $img,
            'description' => $description
        ]);
        echo 'Oeuvre ajoutée avec succès !';
    }

?>

<?php include('footer.php'); ?>


