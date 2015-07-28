 
<?php
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
$reponse = $bdd -> query('SELECT * FROM testopenclass');
	// traducton de la table en resultat
$donnees = $reponse->fetch();

print_r($donnees);

?>

