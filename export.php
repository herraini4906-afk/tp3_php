
<?php
// Auteur : Hiba
// Objectif : Exporter les notes en JSON
// Date : 23/10/2026

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/config.php';

$fichierCSV = __DIR__ . '/data/notes.csv';
$fichierJSON = __DIR__ . '/data/notes.json';

$donnees = [];

if (!file_exists($fichierCSV)) {
    $message = "Aucune note enregistrée. Remplissez d'abord le formulaire.";
} else {
    $handle = fopen($fichierCSV, 'r');

    if ($handle === false) {
        exit("Erreur : impossible d'ouvrir le fichier CSV.");
    }

    while (($ligne = fgetcsv($handle, 1000, ';')) !== false) {
        if (count($ligne) >= 2) {
            $donnees[] = [
                'nom' => $ligne[0],
                'note' => $ligne[1]
            ];
        }
    }

    fclose($handle);

    $contenuJSON = json_encode(
        $donnees,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    );

    if ($contenuJSON === false) {
        exit("Erreur lors de la conversion en JSON.");
    }

    if (file_put_contents($fichierJSON, $contenuJSON) === false) {
        exit("Erreur : impossible de créer notes.json.");
    }

    $message = "Exportation réussie !";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Export JSON</title>
</head>
<body>
    <h1>Suivi des notes des apprenants</h1>
    <h2>Exportation des notes en JSON</h2>

    <p><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></p>

    <?php if (isset($contenuJSON)): ?>
        <h3>Contenu du fichier JSON :</h3>
        <pre><?= htmlspecialchars($contenuJSON, ENT_QUOTES, 'UTF-8') ?></pre>
        <p>Fichier créé : data/notes.json</p>
    <?php endif; ?>

    <p><a href="saisie.html">Ajouter une note</a></p>
    <p><a href="liste.php">Consulter la liste des notes</a></p>
    <p><a href="exo3_tableaux.php">Retour à l'exercice 3</a></p>
</body>
</html>
