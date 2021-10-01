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
if (isset($_POST['auteur']) AND isset($_POST['email']) AND isset($_POST['message']) AND !isset($_POST['id_message_modifier']))
{
    $nom_auteur = htmlspecialchars($_POST['auteur']);
    $e_mail = htmlspecialchars($_POST['email']);
    $message_laisse = htmlspecialchars($_POST['message']);
    $timestamp = date("Y-m-d H:i:s");

    // On insère le message dans la base de donnée
    $req = $bdd->prepare('INSERT INTO message(auteur, email, date_enregistrement, message) VALUES(:auteur, :email, :date_enregistrement, :message)');
    $req->execute(array(
        'auteur' => $nom_auteur,
        'email' => $e_mail,
        'date_enregistrement' => $timestamp,
        'message' => $message_laisse,
    ));
}
// Sinon il s'agit d'une modification et on modifie le message existant
else
{
    if (isset($_POST['auteur']) AND isset($_POST['email']) AND isset($_POST['message']) AND isset($_POST['id_message_modifier']))
    {
        $nom_auteur = htmlspecialchars($_POST['auteur']);
        $e_mail = htmlspecialchars($_POST['email']);
        $message_laisse = htmlspecialchars($_POST['message']);
        $timestamp = date("Y-m-d H:i:s");
        $id = (int) $_POST['id_message_modifier'];

        // On modifie le message dans la base de donnée
        $req = $bdd->prepare('UPDATE message SET auteur = :newauteur, email = :newemail, date_enregistrement = :newdate_enregistrement, message = :newmessage WHERE id = :newid');
        $req->execute(array(
            'newauteur' => $nom_auteur,
            'newemail' => $e_mail,
            'newdate_enregistrement' => $timestamp,
            'newmessage' => $message_laisse,
            'newid' => $id
        ));
    }
}


// On récupère le contenu de la table message dans l'ordre décroissant selon ID
$reponse = $bdd->query('SELECT * FROM message ORDER BY id DESC') or die(print_r($bdd->errorInfo()));

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