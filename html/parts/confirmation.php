<?php
require_once dirname(__FILE__) . '/header.php';
?>

<h2>Merci pour votre commande</h2>

<div>
    <p>Vous pouvez retrouvez cette commande dans votre espace client.</p>

    <a href="/index.php">
        <button>Accueil</button>
    </a>

    <a href="espace_client.php">
        <button>Espace client</button>
    </a>
</div>



<style>
    div {
        display: flex;
        flex-direction: column;
        text-align: center;
        button {
            margin-top: 2rem;
            padding: 5px 20px;
        }
    }
</style>
