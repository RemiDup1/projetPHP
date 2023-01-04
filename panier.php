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
include 'bd.php';

$query2='SELECT * FROM cd where panier = 1';
$resultat=mysqli_query($link, $query2);

$rowcount=mysqli_num_rows($resultat);

if ($rowcount==0) {
    echo "<script>alert('Panier Vide');
        window.location.href='./index.php';
        </script>";
}

else {
    while($donnees=mysqli_fetch_assoc($resultat)){
        echo('<form method="post">');
        $id=$donnees["id"];
        $titre=$donnees["titre"];
        $auteur=$donnees["auteur"];
        $prix=$donnees["prix"];
        $imgPochette=$donnees["img"];
        $img = 'vignettes/'.$imgPochette;
        echo('<img src = '.$img.'></img>');
        echo ('<div class = ele1>'.$titre.'</div>');
        echo ('<div class = ele2>'.$auteur.'</div>');
        echo ('<div class = ele3>'.$prix.' €</div>') ;  
        echo ('<input type="hidden" name="'.$id.'" value="'.$id.'">');
        echo('<input type="submit" value="Retirer du panier"/>'); 
        echo('</form>'); 
    }
}

if(array_key_exists($id, $_POST)) {
    button1();
    
}

function button1() {
    global $id, $link;
    $sql ='UPDATE cd SET panier=0 WHERE id="'.$id.'"';
    $resultat=mysqli_query($link, $sql);
    echo "<script>alert('Article retiré du panier');</script>";
}

?>

<BR>
<BR>
<FORM ACTION = "paiement.php" METHOD = "POST">
        Numéro de carte bancaire :
        <INPUT TYPE = "TEXT" NAME = "NUM" SIZE = "16" MAXSIZE="16"><BR>
        Date d'expiration :
        <INPUT TYPE = "DATE" NAME = "DATE" SIZE = "5" MAXSIZE="5"><BR>

        <INPUT TYPE = "SUBMIT" VALUE = "VALIDER">
</FORM>

</body>
</html>