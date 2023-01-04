<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{

$bdd= "rdupin001_bd"; // Base de données 
$host= "lakartxela.iutbayonne.univ-pau.fr";
$user= "rdupin001_bd"; // Utilisateur 
$pass= "rdupin001_bd"; // mp

$nomtable= "utilisateur"; /* Connection bdd */ 
    
$db=mysqli_connect($host,$user,$pass,$bdd) or die("Impossible de se connecter à la BD");
 
 // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
 // pour éliminer toute attaque de type injection SQL et XSS
 $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
 $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
 
 if($username !== "" && $password !== "")
 {
 $requete = "SELECT count(*) FROM utilisateur where 
 nomUtilisateur = '".$username."' and mdpUtilisateur = '".$password."' ";
 $exec_requete = mysqli_query($db,$requete);
 $reponse = mysqli_fetch_array($exec_requete);
 $count = $reponse['count(*)'];
 if($count!=0) // nom d'utilisateur et mot de passe correctes
 {
 $_SESSION['username'] = $username;
 echo "<script>alert('Connexion réussi');
        window.location.href='../index.php';
    </script>";
 }
 else
 {
 header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
 }
 }
 else
 {
 header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
 }
}
else
{
 header('Location: login.php');
}
mysqli_close($db); // fermer la connexion
?>