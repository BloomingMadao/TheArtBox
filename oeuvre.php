<?php
    include('header.php');
    include('bdd.php');



    // Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
    if(empty($_GET['id'])) {
        header('Location: index.php');
    }


    $mysqlClient = connexion();
    $oeuvresStatement = $mysqlClient->prepare("SELECT * FROM oeuvres WHERE id = :id");
    $oeuvresStatement->execute([
        'id' => (int)$_GET['id'],
        ]);
    $oeuvre = $oeuvresStatement->fetch(PDO::FETCH_ASSOC);

    //DEBUG
    // echo '<pre>';

    // print_r($oeuvre);
    // echo '</pre>';

    // Si aucune oeuvre trouvé, on redirige vers la page d'accueil
    if(is_null($oeuvre) || empty($oeuvre)) {
        header('Location: index.php');
    }
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['img'] ?>" alt="<?= $oeuvre['title'] ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['title'] ?></h1>
        <p class="description"><?= $oeuvre['author'] ?></p>
        <p class="description-complete">
             <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>

<?php include('footer.php'); ?>