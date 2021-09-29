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

// On récupère le message insérer par l'utilisateur

if (isset($_POST['auteur']) AND isset($_POST['email']) AND isset($_POST['message']))
{
    $nom_auteur = htmlspecialchars($_POST['auteur']);
    $e_mail = htmlspecialchars($_POST['email']);
    $message_laisse = htmlspecialchars($_POST['message']);

    // On insère le message dans la base de donnée
    $req = $bdd->prepare('INSERT INTO message(auteur, email, message) VALUES(:auteur, :email, :message)');
    $req->execute(array(
        'auteur' => $nom_auteur,
        'email' => $e_mail,
        'message' => $message_laisse,
    ));
}

// On récupère le contenu de la table message dans l'ordre décroissant selon ID
$reponse = $bdd->query('SELECT auteur, email, date_enregistrement, message FROM message ORDER BY ID DESC');

// On enregistre les messages dans l'array "$_SESSION['message'] qui contient des array "[$_SESSION['nombre']]"
$nombre_message = 0;

while ($message = $reponse->fetch())
{
    $_SESSION['message'][$nombre_message] = $message;
    $nombre_message ++;
}

$_SESSION['nombre'] = $nombre_message;

// On termine le traitement de la requête
$reponse->closeCursor();

// Redirection vers livre_or_liste_messages.php
header('Location: livre_or_liste_messages.php');

?>