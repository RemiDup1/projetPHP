<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter CD</title>
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
    echo('<form method="post">');
    echo '<input type=file NAME="photo" accept="image/png, image/jpeg"><BR>
    Titre :
        <INPUT TYPE="text" NAME="Titre" SIZE="20" MAXSIZE="50" ><BR>
    Genre :
        <INPUT TYPE="text" NAME="Genre" SIZE="20" MAXSIZE="50" ><BR>
    Auteur :
        <INPUT TYPE="text" NAME="Auteur" SIZE="20" MAXSIZE="50" ><BR>
    Prix :
        <INPUT TYPE="text" NAME="Prix" SIZE="20" MAXSIZE="50" ><BR>

    <input type="submit" value="Ajouter un CD"/>';
    
    echo('</form>'); 



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