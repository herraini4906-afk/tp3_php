
<?php
// Auteur : Hiba
// Objectif : Manipulation des tableaux PHP
// Date : 23/10/2026

require 'config.php';
include_once __DIR__ . '/includes/entete_inc.php';
include_once __DIR__ . '/includes/menu_inc.php';

// Fonction pour calculer la mention
function mention($note)
{
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}

// Exercice 3.1 : Création des tableaux

$notes = [
    "Mohamed" => 16,
    "Ahmed" => 14,
    "Hind" => 13,
    "Aicha" => 15,
    "Samir" => 13,
    "Zakaria" => 13,
    "Rafik" => 10,
    "Ilham" => 9,
    "Hamza" => 7,
    "Sami" => 7,
    "Noura" => 14
];

$modules = ["PHP", "HTML/CSS", "SQL"];

echo "<h1>Exercice 3 : Tableaux PHP</h1>";
echo "<h2>3.1 : Modules avec foreach</h2>";

foreach ($modules as $module) {
    echo htmlspecialchars($module) . "<br>";
}

echo "<h3>Modules par indice</h3>";

for ($i = 0; $i < count($modules); $i++) {
    echo $i . " : " . htmlspecialchars($modules[$i]) . "<br>";
}

// Exercice 3.2 : Tableau HTML

echo "<h2>3.2 : Notes et mentions</h2>";

echo "<table border='1' cellpadding='8'>";
echo "<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>";

foreach ($notes as $nom => $note) {
    $couleur = ($note < SEUIL) ? "red" : "black";

    echo "<tr style='color:$couleur'>";
    echo "<td>" . htmlspecialchars($nom) . "</td>";
    echo "<td>$note</td>";
    echo "<td>" . mention($note) . "</td>";
    echo "</tr>";
}

echo "</table>";

// Exercice 3.3 : Statistiques sans array_sum()

echo "<h2>3.3 : Statistiques</h2>";

$somme = 0;
$meilleure = NOTE_MIN;
$faible = NOTE_MAX;
$effectifs = [];

foreach ($notes as $nom => $note) {
    $somme += $note;

    if ($note > $meilleure) {
        $meilleure = $note;
    }

    if ($note < $faible) {
        $faible = $note;
    }

    $m = mention($note);

    if (!isset($effectifs[$m])) {
        $effectifs[$m] = 0;
    }

    $effectifs[$m]++;
}

$nombre = count($notes);
$moyenne = $somme / $nombre;

echo "Somme : $somme<br>";
echo "Moyenne : " . number_format($moyenne, 2) . "<br>";
echo "Meilleure note : $meilleure<br>";
echo "Plus faible note : $faible<br>";

echo "<h3>Vérification avec les fonctions PHP</h3>";
echo "Somme : " . array_sum($notes) . "<br>";
echo "Nombre : " . count($notes) . "<br>";
echo "Maximum : " . max($notes) . "<br>";
echo "Minimum : " . min($notes) . "<br>";

echo "<h3>Effectifs par mention</h3>";

foreach ($effectifs as $m => $n) {
    echo htmlspecialchars($m) . " : $n apprenant(s)<br>";
}

// Exercice 3.4 : Tri des tableaux

function afficher($tab)
{
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>Nom</th><th>Note</th></tr>";

    foreach ($tab as $nom => $note) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars((string)$nom) . "</td>";
        echo "<td>" . htmlspecialchars((string)$note) . "</td>";
        echo "</tr>";
    }

    echo "</table><br>";
}

echo "<h2>3.4 : Tri des notes</h2>";

$tri = $notes;
ksort($tri);
echo "<h3>1. Noms croissants (ksort)</h3>";
afficher($tri);

$tri = $notes;
arsort($tri);
echo "<h3>2. Notes décroissantes (arsort)</h3>";
afficher($tri);

$tri = $notes;
krsort($tri);
echo "<h3>3. Noms décroissants (krsort)</h3>";
afficher($tri);

$tri = $notes;
asort($tri);
echo "<h3>4. Notes croissantes (asort)</h3>";
afficher($tri);

// Pour un tableau indexé comme modules : sort($modules)

// Exercice 3.5 : Opérateurs de tableaux

echo "<h2>3.5 : Opérateurs de tableaux</h2>";

$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

echo "<h3>Résultat de a + b</h3>";
print_r($a + $b);

echo "<br><h3>Résultat de a == b</h3>";
var_dump($a == $b);

echo "<br><h3>Résultat de a === b</h3>";
var_dump($a === $b);

include_once __DIR__ . '/includes/pied_inc.php';
?>
