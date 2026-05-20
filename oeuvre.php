<?php
 include('oeuvres.php');
$getData = $_GET;
$id=$getData['id'];


if(
    !isset($getData) ||
    !in_array($id,$oeuvres[$id-1])
    
){
    echo 'L\'oeuvre n\'existe pas';
}


?>


<?php include('header.php');?>
    <article id="detail-oeuvre">
        <div id="img-oeuvre">
            <img src="<?php echo $oeuvres[$id-1]['img']; ?>" alt="<?php echo $oeuvres[$id-1]['title']; ?>">
        </div>
        <div id="contenu-oeuvre">
            <h1><?php echo $oeuvres[$id-1]['title']; ?></h1>
            <p class="description"><?php echo $oeuvres[$id-1]['author']; ?></p>
            <p class="description-complete">
                <?php echo $oeuvres[$id-1]['description']; ?>
            </p>
        </div>
    </article>
<?php include('footer.php');?>