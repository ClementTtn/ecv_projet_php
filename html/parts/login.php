<?php
// Lancement de la session
session_start();
// Si user connecté, redirection vers index.php
if (isset($_SESSION['userId'])) {
    header("Location: ../index.php");
}

require_once(dirname(__FILE__) . '/../config/db.php');

global $dsn, $db_user, $db_pass;
$dbh = new PDO($dsn, $db_user, $db_pass);

// Requête BDD pour le login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Récupération du user à partir de l'email renseigné dans le form
    $stmt = $dbh->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Comparaison entre le password du form et celui stocké en BDD
    if ($user && password_verify($password, $user['password'])) {
        // Si comparaison est OK -> mise en place des variables de la session
        $_SESSION['userId'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        // Redirection vers index.php
        header("Location: ../index.php");
    } else {
        // Comparaison pas OK -> message d'erreur
        $error_message = "Identifiants incorrects";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>
        <h1>Connexion</h1>
        <form method="post">
            <!-- Affichage du message d'erreur du login -->
            <?php
            if (isset($error_message)) {
                echo "<p style='color: red;'>$error_message</p>";
            }
            ?>
            <p>
                <label for="email">Email :</label>
                <input type="text" name="email" required>
            </p>
            <p>
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" required>
            </p>
            <input type="submit" value="Se connecter">
        </form>
    </body>
</html>

<style>
    * {
        font-family: sans-serif !important;
    }

    html {
        padding: 2rem 3rem;
    }

    h1 {
        text-align: center;
        margin-top: 5rem;
        margin-bottom: 5rem;
    }

    form {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 16px;
        box-sizing: border-box;
        border: 1px solid lightgrey;
        border-radius: 4px;
    }
</style>
