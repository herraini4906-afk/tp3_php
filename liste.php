
<?php
// Auteur : Hiba
// Objectif : Lire et afficher les notes du fichier CSV
// Date : 23/10/2026

require 'config.php';

$fichier = __DIR__ . '/data/notes.csv';

echo "<h1>Liste des apprenants</h1>";

if (!file_exists($fichier)) {
    exit("Aucune note enregistrée. Ajoutez d'abord un apprenant.");
}

$handle = fopen($fichier, 'r');

if ($handle === false) {
    exit("Erreur lors de l'ouverture du fichier.");
}

$total_moyennes = 0;
$nombre_apprenants = 0;

echo "<table border='1' cellpadding='8'>";
echo "<tr><th>Nom</th><th>Info</th><th>Math</th>";
echo "<th>Moyenne</th><th>Mention</th></tr>";

while (($ligne = fgetcsv($handle, 0, ';')) !== false) {
    if (count($ligne) < 3) {
        continue;
    }

    [$nom, $info, $math] = $ligne;

    if (!is_numeric($info) || !is_numeric($math)) {
        continue;
    }

    $moyenne = ((float)$info + (float)$math) / 2;

    if ($moyenne >= 16) {
        $mention = "Très bien";
    } elseif ($moyenne >= 14) {
        $mention = "Bien";
    } elseif ($moyenne >= 12) {
        $mention = "Assez bien";
    } elseif ($moyenne >= SEUIL) {
        $mention = "Passable";
    } else {
        $mention = "Ajourné";
    }

    $couleur = $moyenne < SEUIL ? "red" : "black";

    echo "<tr style='color:$couleur'>";
    echo "<td>" . htmlspecialchars($nom, ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td>" . htmlspecialchars($info) . "</td>";
    echo "<td>" . htmlspecialchars($math) . "</td>";
    echo "<td>" . number_format($moyenne, 2) . "</td>";
    echo "<td>$mention</td>";
    echo "</tr>";

    $total_moyennes += $moyenne;
    $nombre_apprenants++;
}

fclose($handle);

echo "</table>";

if ($nombre_apprenants > 0) {
    $moyenne_classe = $total_moyennes / $nombre_apprenants;
    echo "<h3>Moyenne générale de la classe : ";
    echo number_format($moyenne_classe, 2) . "</h3>";
} else {
    echo "<p>Aucune donnée valide.</p>";
}

echo "<a href='saisie.html'>Ajouter un apprenant</a>";
?>
