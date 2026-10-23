
<?php
// Auteur : Hiba
// Objectif : Afficher le profil après connexion
// Date : 23/10/2026

error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

if (!isset($_SESSION["utilisateur"])) {
    header("Location: login.php");
    exit;
}

$utilisateur = $_SESSION["utilisateur"];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil utilisateur</title>
</head>
<body>
    <h1>Suivi des notes des apprenants</h1>

    <h2>Bienvenue <?= htmlspecialchars($utilisateur, ENT_QUOTES, 'UTF-8') ?> !</h2>

    <p>Connexion réussie.</p>

    <p><a href="liste.php">Consulter les notes</a></p>
    <p><a href="saisie.html">Ajouter une note</a></p>
    <p><a href="export.php">Exporter les notes en JSON</a></p>

    <form action="deconnexion.php" method="POST">
        <button type="submit">Se déconnecter</button>
    </form>
</body>
</html>
