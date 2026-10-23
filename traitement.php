
<?php
// Auteur : Hiba
// Objectif : Valider et enregistrer les notes des apprenants
// Date : 23/10/2026

require_once __DIR__ . '/config.php';

// Vérifier que le formulaire utilise POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: saisie.html");
    exit;
}

// Récupérer les données du formulaire
$nom = trim($_POST["nom"] ?? "");
$noteSaisie = trim((string)($_POST["note"] ?? ""));

// Vérifier le nom
if ($nom === "" || strlen($nom) > 100) {
    exit("Erreur : le nom est obligatoire et ne doit pas dépasser 100 caractères.");
}

// Vérifier que la note est numérique
if ($noteSaisie === "" || !is_numeric($noteSaisie)) {
    exit("Erreur : la note doit être un nombre.");
}

$note = (float) $noteSaisie;

// Vérifier les limites de la note
if ($note < NOTE_MIN || $note > NOTE_MAX) {
    exit("Erreur : la note doit être comprise entre 0 et 20.");
}

// Créer le dossier data s'il n'existe pas
$dossier = __DIR__ . '/data';

if (!is_dir($dossier)) {
    if (!mkdir($dossier, 0775, true) && !is_dir($dossier)) {
        exit("Erreur : impossible de créer le dossier data.");
    }
}

// Chemin du fichier CSV
$fichier = $dossier . '/notes.csv';

// Ouvrir le fichier en ajout
$handle = fopen($fichier, "a");

if ($handle === false) {
    exit("Erreur : impossible d'ouvrir le fichier notes.csv.");
}

// Enregistrer le nom et la note, séparés par un point-virgule
if (fputcsv($handle, [$nom, $note], ";") === false) {
    fclose($handle);
    exit("Erreur : impossible d'enregistrer la note.");
}

fclose($handle);

// Afficher le résultat
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement réussi</title>
</head>
<body>

    <h1>Enregistrement réussi !</h1>

    <p>
        L'apprenant
        <strong><?= htmlspecialchars($nom, ENT_QUOTES, 'UTF-8') ?></strong>
        a été enregistré.
    </p>

    <p>
        Note :
        <strong><?= htmlspecialchars((string)$note, ENT_QUOTES, 'UTF-8') ?>/20</strong>
    </p>

    <p>Le fichier <strong>data/notes.csv</strong> a été mis à jour.</p>

    <p><a href="saisie.html">Ajouter un autre apprenant</a></p>
    <p><a href="liste.php">Consulter la liste des notes</a></p>
    <p><a href="export.php">Exporter en JSON</a></p>

</body>
</html>
