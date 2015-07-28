<!-- Fichier index.php -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="appeldb.php" method="post">
	<input type="text" name="nom" placeholder="Nom">
	<input type="text" name="texte" placeholder="Message">
	<input type="submit">
</form>
<?php
/*Lire bdd*/
try
{
	// appel de dbname TEST
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    //----------------------------------
    //Exemple d appel sur serveur:
    //$bdd = new PDO('mysql:host=sql.hebergeur.com;dbname=mabase;charset=utf8', 'pierre.durand', 's3cr3t');
    //------------------------------------
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
	// lecture et selection de notre table TESTOPENCLASS
	// variable where \'LAURENT\'
$reponse = $bdd -> query('SELECT * FROM testopenclass ORDER BY ID DESC LIMIT 10 ');
	// traducton et analyse de la table en resultat
while ( $donnees = $reponse->fetch()) {
	echo '<p>'.$donnees['ID'].' '.$donnees['nom'].' '.$donnees['texte'].' '.$donnees['time'].'</p>';
}
// provoquer la « fermeture du curseur d'analyse des résultats »
$reponse->closeCursor();
?>
</body>
</html>


<!-- appeldb.php -->
<!-- Ecrire Bdd -->
 <?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
// On ajoute une entrée dans la table testopenclass
$reponse = $bdd->prepare('INSERT INTO testopenclass(nom, texte) VALUES(?,?)');
$reponse -> execute(array
	($_POST['nom'],$_POST['texte']));

// Redirection du visiteur vers la page du minichat
header('Location: index.php');
?>
