<?php
// Lancement de la session
session_start();
// Destruction des informations de la session -> logout du user
session_destroy();
// Redirection vers login.php
header("Location: login.php");
?>