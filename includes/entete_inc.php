
<?php
// Auteur : Hiba
// Objectif : Afficher l'entête des pages
// Date : 23/10/2026

require_once __DIR__ . '/../config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Suivi des notes</title>
</head>
<body>
    <h1>Suivi des notes des apprenants</h1>
    <h3><?php echo htmlspecialchars(ETABLISSEMENT); ?></h3>
    <hr>
