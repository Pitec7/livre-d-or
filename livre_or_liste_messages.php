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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Livre d'or</title>
</head>

<body class="d-flex justify-content-center align-items-center bg-dark">
    <form class="col-10 bg-light mt-5 p-3 rounded-3" action="afficher.php" method="POST">
        <fieldset>
        <legend class="mx-3 mb-4 fs-2 fw-bold fst-italic text-decoration-underline text-success">Pépites</legend>
        <div class="mx-3">
            <a href="index.php"><button type="button" class="btn btn-primary"><i class="bi bi-plus"></i>Je veux laisser un message</button></a>
        </div>
        <?php
        for ($i = 0; $i < $_SESSION['nombre']; $i++)
        {
        ?>
        <div class="row mx-3 py-3 border-bottom border-success border-3">
            <div class="col-12 col-sm-6 col-lg-3">
                <i class="bi bi-file-person-fill"></i><?php echo $_SESSION['message'][$i]['auteur']; ?>
            </div>            
            <div class="col-12 col-sm-6 col-lg-4">
                <i class="bi bi-envelope-fill"></i><?php echo $_SESSION['message'][$i]['email']; ?>
            </div>            
            <div class="col-12 col-sm-7 col-lg-4">
                <i class="bi bi-clock"></i><?php echo $_SESSION['message'][$i]['date_enregistrement']; ?>
            </div>
            <div class="col-12 col-sm-5 col-lg-1">
                <a class="text-danger" href="supprimer.php?id_message=<?php echo $_SESSION['message'][$i]['id']; ?>"><i class="bi bi-trash"></i></a>
            </div>
            <div class="pt-2 col-12 text-break">
                <a class="text-decoration-none text-reset" href="modifier.php?id_message=<?php echo $_SESSION['message'][$i]['id']; ?>"><?php echo $_SESSION['message'][$i]['message']; ?></a>
            </div>
        </div>
        <?php
        }
        ?>
        </fieldset>
    </form>
</body>

</html>