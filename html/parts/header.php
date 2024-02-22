<?php
// Header.php appelé dans chaque fichier sauf login.php

// Lancement de la session
session_start();
// Si pas de user connecté -> redirection vers login.php
if (!isset($_SESSION['userId'])) {
    header("Location: /parts/login.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Projet PHP</title>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="/index.php">Accueil</a></li>
                    <li><a href="/parts/espace_client.php">Espace client</a></li>
                    <li><a href="/parts/logout.php">Déconnexion</a></li>
                </ul>
                <p>Bonjour <?php echo $_SESSION['name']; ?></p>
            </nav>
        </header>
    </body>
</html>



<style>
    * {
        font-family: sans-serif !important;
    }

    html {
        padding: 2rem 3rem;
    }

    header nav {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 5rem;
        border-bottom: 1px solid black;
        ul {
            display: flex;
            flex-direction: row;
            li {
                margin-right: 2rem;
                list-style: none;
                a {
                    color: black;
                    text-decoration: none;s
                }
            }
        }
    }

    h2 {
        text-align: center;
        margin-bottom: 5rem;
    }
</style>
