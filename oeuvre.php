<?php
 include('oeuvres.php');
$getData = $_GET;
$id=$getData['id'];

$o = null;

foreach($oeuvres as $oeuvre){
    if ($id == $oeuvre['id']){
        $o = $oeuvre;
    }
}
//DEBUG
// echo '<pre>';
//     print_r($o);
// echo '</pre>';
// if(
//     !isset($getData) ||
//     !in_array($id,$oeuvres[$id-1])
    
// ){
//     echo 'L\'oeuvre n\'existe pas';
// }


?>


<?php include('header.php');?>
    <article id="detail-oeuvre">
        <div id="img-oeuvre">
            <img src="<?php echo $o['img']; ?>" alt="<?php echo $o['title']; ?>">
        </div>
        <div id="contenu-oeuvre">
            <h1><?php echo $o['title']; ?></h1>
            <p class="description"><?php echo $o['author']; ?></p>
            <p class="description-complete">
                <?php echo $o['description']; ?>
            </p>
        </div>
    </article>
<?php include('footer.php');?>