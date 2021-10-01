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
    <form class="col-8 col-sm-7 col-md-5 col-lg-4 bg-light mt-5 p-3 rounded-3" action="afficher.php" method="post">
        <fieldset>
            <legend class="fs-2 fw-bold fst-italic text-decoration-underline text-success">Laissez vos traces...</legend>
            <div class="my-3">
                <label for="auteur" class="form-label">Auteur</label>
                <input type="text" class="form-control" name="auteur" id="auteur" required />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required />
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" name="message" id="message" rows="5" placeholder="Écrivez votre joli messsage ici. ;)" required></textarea>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary col-6 col-sm-4 col-md-3 mb-3 mb-sm-0 mx-3 mx-md-4 mx-xxl-5 text-white">Envoyer</button>
                <a class="btn btn-secondary col-6 col-sm-4 col-md-3 mx-3 mx-md-4 mx-xxl-5 text-white text-decoration-none" href="livre_or_liste_messages.php">Annuler</a>
            </div>
        </fieldset>
    </form>
</body>

</html>