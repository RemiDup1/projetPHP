<?php
extract($_POST,EXTR_OVERWRITE);
foreach ($_POST as $idArticle);
echo($idArticle);

include 'bd.php';

$query2='SELECT * FROM cd where id = "'.$idArticle.'"';
$resultat=mysqli_query($link, $query2);

while($donnees=mysqli_fetch_assoc($resultat)){
    echo('<form method="post">');
    $id=$donnees["id"];
    $titre=$donnees["titre"];
    $auteur=$donnees["auteur"];
    $prix=$donnees["prix"];
    $imgPochette=$donnees["img"];
    $img = 'pochettes/'.$imgPochette;
    echo('<img src = '.$img.'></img>');
    echo ('<div class = ele1>'.$titre.'</div>');
    echo ('<div class = ele2>'.$auteur.'</div>');
    echo ('<div class = ele3>'.$prix.' €</div>') ;  
    echo('<input type="submit" name="button1" class="button" value="Button1" />'); 
    echo('</form>'); 
}


if(array_key_exists('button1', $_POST)) {
    button1();
}

function button1() {
    $sql ='UPDATE cd SET panier=0 WHERE id=2';
    echo "<script>alert('Fonction dans panier appelé');</script>";
}



//$sql ='UPDATE liste_proprietaire SET adresse="3, rue des tulipes", age="65" WHERE nom="Benoît"';
?>