<?php
// Démarrage de la session
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
    <title>Livre d'or</title>
</head>

<body class="d-flex justify-content-center align-items-center bg-dark">
    <form class="col-8 col-sm-7 col-md-5 col-lg-3 bg-light mt-5 p-3 rounded-3" action="livre_or_liste_messages.php" method="post">
        <fieldset>
            <legend class="fs-2 fw-bold fst-italic text-decoration-underline text-success">Laissez vos traces...</legend>
            <div class="my-3">
                <label for="auteur" class="form-label">Auteur</label>
                <input type="text" class="form-control" name="auteur" id="auteur" />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" pattern="/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" />
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" name="message" id="message" rows="5" placeholder="Laissez votre joli messsage ici. ;)"></textarea>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary col-3 mx-3 text-white">Envoyer</button>
                <button typy="button" class="btn btn-primary col-3 mx-3"><a href="livre_or_liste_messages.php" class="text-white text-decoration-none">Annuler</a></button>
            </div>
        </fieldset>
    </form>
</body>

</html>