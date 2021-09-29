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

<body>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="row">Pépites</th>
            </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < $_SESSION['nombre']; $i++)
        {
        ?>
            <tr class="row">
                <td class="col-3"><i class="bi bi-file-person-fill"></i><?php echo $_SESSION['message'][$i]['auteur']; ?></td>
                <td class="col-4"><i class="bi bi-envelope-fill"></i><?php echo $_SESSION['message'][$i]['email']; ?></td>
                <td class="col-4"><i class="bi bi-clock"></i><?php echo $_SESSION['message'][$i]['date_enregistrement']; ?></td>
                <td class="col-1"><a href="livre_or_liste_messages_post.php"><i class="bi bi-trash"></i></a></td>
            </tr>
            <tr class="row">
                <td class="col-12"><?php echo $_SESSION['message'][$i]['message']; ?></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</body>

</html>