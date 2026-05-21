<?php
include('bdd.php');
include('header.php');
$mysqlClient = connexion();
$oeuvresStatement = $mysqlClient->query('SELECT * FROM oeuvres');
$oeuvres = $oeuvresStatement->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($oeuvres);
// echo '</pre>';

?>

<div id="liste-oeuvres">
    <?php foreach ($oeuvres as $oeuvre) : ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?php echo $oeuvre['id']; ?>">
                <img src="<?php echo $oeuvre['img']; ?>" alt="<?php echo $oeuvre['title']; ?>">
                <h2><?php echo $oeuvre['title']; ?></h2>
                <p class="description"><?php echo $oeuvre['author']; ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php include('footer.php'); ?>