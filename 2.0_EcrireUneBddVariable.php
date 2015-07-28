
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
$bdd->exec('INSERT INTO testopenclass(nom, texte) VALUES(\'Ariane\', \'Bonjour je mappel Ariane\')');
echo 'Le jeu a bien été ajouté !';
?>
