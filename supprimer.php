<?php
// Démarrage de la session
session_start();

try
{
    // On se connecte à la base de donnée MySQL, ici livre_or
    $bdd = new PDO('mysql:host=localhost;dbname=livre_or;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}

//On récupère le numéro de l'ID par la variable $_GET, on le fait passer par la mesure de sécurité
if(isset($_GET['id_message']))
{
    // On force la conversion en nombre entier
    $_GET['id_message'] = (int) $_GET['id_message'];

    // Le nombre doit être plus grand que 0
    if($_GET['id_message'] > 0);
    {
        // On supprimer l'entrée où id = $_GET['id_message']
        $req = $bdd->prepare('DELETE FROM message WHERE id = ?');
        $req->execute(array($_GET['id_message']));
    }
}

// Redirection vers livre_or_liste_messages.php
header('Location: afficher.php');

?>