<?php
    $bdd= "rdupin001_bd"; // Base de données 
    $host= "lakartxela.iutbayonne.univ-pau.fr";
    $user= "rdupin001_bd"; // Utilisateur 
    $pass= "rdupin001_bd"; // mp

    $nomtable= "cd"; /* Connection bdd */ 
    
    $link=mysqli_connect($host,$user,$pass,$bdd) or die("Impossible de se connecter à la BD");

    try
    {
        $query="SELECT * FROM cd";
        $result=mysqli_query($link,$query);
    }
    
    catch(Exception $e){
        echo 'Erreur : '.$e->getMessage().'<br />';
    }

    while($donnees=mysqli_fetch_assoc($result)){
        $id=$donnees["id"];
        $titre=$donnees["titre"];
        $auteur=$donnees["auteur"];
        $prix=$donnees["prix"];
        $img=$donnees["img"];
        echo('<img src = pochettes/'.$img.' height="50" widht="50"></img>');
        echo ''. $titre . '    |   '. $auteur.'    |   '. $prix.' € </h3>';
    }

    mysqli_close($link);
?>