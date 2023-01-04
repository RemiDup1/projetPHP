<?php 
	include 'bd.php';
    session_start();
?>

<!DOCTYPE html>

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
				<li><a href="panier.php">Mon panier</i><a></li>
                <div></div>
                <li>
                <?php
                if($_SESSION['username'] !== ""){
                    echo '<a href="login/deconnexion.php">Se Deconnecter</i><a>';
                    }
                else 
                {
                    echo '<a href="login/login.php">Se Connecter</i><a>';
                }
                    

                ?>
                </li>
                <div></div>              
                
			</ul>
		</nav>
        <hr>
	</header>
	<main>    
        <?php
    
        if($_SESSION['username'] !== ""){
        $user = $_SESSION['username'];
        // afficher un message
        echo "Bonjour $user, vous êtes connecté";
        }


        while($donnees=mysqli_fetch_assoc($result)){
            echo('<section class="articles">');
            echo('<form method="post" action="./selectionner.php">');
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
            echo ('<input type="hidden" name="Disque'.$id.'" value="'.$id.'">');
            echo(' <input type="submit" value="Voir le détail"> ');
            
            echo ('</form>');
            echo ('</section>');
        }
        
        ?>
	</main>
	<footer>
	</footer>
</body>
</html>