<!DOCTYPE html>

<?php 
	include 'bd.php';
?>

<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width-device-width, initial-scale=0.1">

	<link rel="stylesheet" href="style.css">
	<title>Projet - php</title>
</head>
<body>
	<header>
		<h1>Achat et revente de CD</h1>
		<nav>
            <h2>/*Le Nom du site Web*/</h2>
			<ul>
				<li><a href="clear.php">Mon panier</i><a></li>
                <div></div>              
                
			</ul>
		</nav>
        <hr>
	</header>
	<main>
        <?php
        while($donnees=mysqli_fetch_assoc($result)){
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
        ?>
	</main>
	<footer>
	</footer>
</body>
</html>