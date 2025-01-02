<?php 
try{/**/
    $db= new PDO ("mysql:host=localhost;dbname=ecommerce;chraset=utf8","root","root");
    $db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
   }
   catch(Exception	$e){
       $e->getMessage ();
   }
if (isset($_POST["ajout"])){
    //$c_mp=  $_POST["confirmer_mdp"];
    $mp= $_POST['motdepasse'];
    $email=$_POST['email'];
    $name= $_POST['username'];

$hashage = password_hash($mp,PASSWORD_DEFAULT);
$req=$db->prepare("INSERT INTO users(username,email,wordofpass) values(?,?,?)");
$req->execute(array($name,$email,$hashage));

}
?>

<!DOCTYPE html> 
<html lang="fr"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Inscription</title> 
    <link rel="stylesheet" href="style.css"> //<!--ajoute fichier CSS la--> 
</head> 
<body> 
    <h2>Inscription</h2> 

    <form method="POST"> <!--Traitement?--> 
        <label for="username">Nom Identifiant:</label> 
        <input type="text" id="username" name="username" required><br><br> 
        <label for="email">Email:</label> 
        <input type="email" id="email" name="email" required><br><br> 
        <label for="motdepasse">Mot de passe:</label> 
        <input type="password" id="motdepasse" name="motdepasse" required><br><br> 
        <!--<label for="confirmer_mdp">Confirmer le mot de passe:</label> 
        <input type="password" id="confirmer_mdp" name="confirmer_mdp" required><br><br> --> 
        <input  name="ajout" type="submit" value="Sinscrire"> 
    </form> 
    <p>Déjà inscrit ? <a href="connexion.html">Connectez-vous ici</a></p> 
</body> 
</html> 

 

 