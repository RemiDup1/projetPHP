<!DOCTYPE html>

<?php 
	include 'bd.php';
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    while($donnees=mysqli_fetch_assoc($result)){
            echo('<section class="articles">');
            echo('<a href="./selectionner.php">');
            $id=$donnees["id"];
            $titre=$donnees["titre"];
            $auteur=$donnees["auteur"];
            $prix=$donnees["prix"];
            $imgPochette=$donnees["img"];
            $img = imagecreatefromjpeg('pochettes/'.$imgPochette);
            $img = imagescale( $img, 50, 50 );
            $imgVignette = 'vignettes/'.$imgPochette;
            imagejpeg($img,$imgVignette);
            echo('<img src = '.$imgVignette.'></img>');
            echo ('<div class = ele1>'.$titre.'</div>');
            echo ('<div class = ele2>'.$auteur.'</div>');
            echo ('<div class = ele3>'.$prix.' €</div>') ;
            echo('</button>');
            echo ('</a>');
            echo ('</section>');
        }   
    
?>
</body>
</html>