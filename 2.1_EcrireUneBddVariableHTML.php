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
	($_GET['nom'],$_GET['texte']));

echo 'Le jeu a bien été ajouté !';
?>

