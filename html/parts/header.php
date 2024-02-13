<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header("Location: parts/login.php");
}
var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Projet PHP</title>
        <link rel="stylesheet" href="../styles/styles.css">
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="parts/logout.php">Déconnexion</a></li>
            </ul>
        </nav>
    </body>
</html>
