<!DOCTYPE html> 
<html lang="fr"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Connexion</title> 
    <link rel="stylesheet" href="style.css"> <!-- Vous pouvez ajouter votre propre fichier CSS --> 
</head> 
<body> 
    <h2>Connexion</h2> 
    <form action="connexion_traitement.php" method="POST"> <!-- Traitement via PHP ou autre --> 
        <label for="email">Email :</label> 
        <input type="email" id="email" name="email" required><br><br>
        <label for="motdepasse">Mot de passe :</label> 
        <input type="password" id="motdepasse" name="motdepasse" required><br><br>          
        <input type="submit" value="Se connecter"> 
    </form> 
    <p>Pas encore inscrit ? <a href="sign-up.html">Inscrivez-vous ici</a></p> 
</body> 
</html> 
