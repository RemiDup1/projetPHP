<?php
    $bdd= "roose"; // Base de données 
    $host= "lakartxela.iutbayonne.univ-pau.fr";
    $user= "roose"; // Utilisateur 
    $pass= "roose"; // mp

    $nomtable= "bourse"; /* Connection bdd */ 
    //print "Tentative de connexion sur sitebd<br>";
    
    try
    {
        $connexion = new PDO ('mysql:host='.$host.';dbname='.$bdd, $user,$pass);
        $resultats=$connexion->query("SELECT * FROM bourse order by ville "); 
        /*
        while( $tuple = $resultats->fetch() ) {
            echo 'ville : '.$tuple->ville.', indice : '.$tuple->indice.'<br />';
        }
        */
    } // fin try
    catch(Exception $e){
        echo 'Erreur : '.$e->getMessage().'<br />';
    }


    $createurs = $resultats->fetchAll(PDO::FETCH_OBJ);
    while( $tuple = next($createurs) ) {
        echo '<h3>'.'Ville : '. $tuple ->ville . ', Indice : '. $tuple ->indice.'</h3>';
    }

?>