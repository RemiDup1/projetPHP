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
    echo('<input type="submit" name="'.$id.'" class="button" value="'.$id.'"/>'); 
    echo('</form>'); 
}


if(array_key_exists($id, $_POST)) {
    button1();
}

function button1() {
    global $idArticle, $link;
    echo($idArticle);
    $sql ='UPDATE cd SET panier=1 WHERE id="'.$idArticle.'"';
    $resultat=mysqli_query($link, $sql);
    echo "<script>alert('Fonction dans panier appelé');</script>";
}



//$sql ='UPDATE liste_proprietaire SET adresse="3, rue des tulipes", age="65" WHERE nom="Benoît"';
?>