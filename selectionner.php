<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
		<h1>Achat et revente de CD</h1>
		<nav>
            <h2>/*Le Nom du site Web*/</h2>
			<ul>
				<li><a href="index.php">Accueil</i><a></li>
                <div></div>              
                
			</ul>
		</nav>
        <hr>
	</header>

    <?php
        extract($_POST,EXTR_OVERWRITE);
        foreach ($_POST as $idArticle);

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
            echo ('<input type="hidden" name="'.$id.'" value="'.$id.'">');
            echo('<input type="submit" value="Ajouter au panier"/>'); 
            echo('</form>'); 
        }


        if(array_key_exists($id, $_POST)) {
            button1();
        }

        function button1() {
            global $idArticle, $link;
            $sql ='UPDATE cd SET panier=1 WHERE id="'.$idArticle.'"';
            $resultat=mysqli_query($link, $sql);
            echo "<script>alert('Fonction dans panier appelé');</script>";
        }

    ?>
</body>
</html>

