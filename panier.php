<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Panier</title>
</head>
<body>
    <h1>Panier</h1>
    <?php

    include 'bd.php';
    while($donnees=mysqli_fetch_assoc($result)){
        if ($donnees["panier"] == 1) {
            echo('<section class="articles">');
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
            echo ('</section>');
        }
    }

    ?>
</body>
</html>