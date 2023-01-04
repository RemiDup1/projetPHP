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
        $num = $_POST['NUM'];
        $date = $_POST['DATE'];

        $tmstp1 = new DateTime($date);

        $dateJour = date('y-m-d');
        $tmstp2 = new DateTime($dateJour);
        $tmstp2 = $tmstp2->modify('+3 month');
        
        if ($num[0]==$num[15] && $tmstp1 >  $tmstp2) {
            // tout effacer
            echo "<script>alert('Paiement accepté, redirection vers la page d accueil');
            window.location.href='./index.php';
            </script>";
        }
        else {
            echo "<script>alert('Paiment refusé, redirection vers votre panier');
            window.location.href='./panier.php';
            </script>";
        }
    ?>
</body>
</html>