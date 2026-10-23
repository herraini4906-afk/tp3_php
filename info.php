
<?php
// Auteur : Hiba
// Objectif : Traiter le formulaire GET
// Date : 23/10/2026

$nom = trim($_GET['nom'] ?? '');
$prenom = trim($_GET['prenom'] ?? '');
$sexe = $_GET['sexe'] ?? '';

if ($nom === '' || $prenom === '' ||
    !in_array($sexe, ['M', 'F'], true)) {
    exit("Veuillez remplir correctement le formulaire.");
}

$nom = htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');
$prenom = htmlspecialchars($prenom, ENT_QUOTES, 'UTF-8');

if ($sexe === 'M') {
    echo "Bonjour Monsieur $prenom $nom";
} else {
    echo "Bonjour Madame $prenom $nom";
}
?>
