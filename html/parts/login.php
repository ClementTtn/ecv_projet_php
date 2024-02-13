<?php
session_start();
if (isset($_SESSION['userId'])) {
    header("Location: ../index.php");
}

require_once(dirname(__FILE__) . '/../config/db.php');

global $dsn, $db_user, $db_pass;
$dbh = new PDO($dsn, $db_user, $db_pass);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $dbh->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['userId'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        header("Location: ../index.php");
    } else {
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
        <link rel="stylesheet" href="../styles/styles.css">
    </head>
    <body>
        <h2>Connexion</h2>
        <?php
        if (isset($error_message)) {
            echo "<p style='color: red;'>$error_message</p>";
        }
        ?>
        <form method="post">
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
