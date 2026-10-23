
<?php
// Auteur : Hiba
// Objectif : Structures de contrôle et boucles en PHP
// Date : 23/10/2026

require 'config.php';

echo "<h1>Exercice 2 : Structures de contrôle et boucles</h1>";

// Exercice 2.1 : if / elseif / else

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

echo "<h2>Exercice 2.1 : Mentions</h2>";

$notes_test = [18, 15, 13, 10, 7];

foreach ($notes_test as $note) {
    echo "Note : $note - Mention : " . mention($note) . "<br>";
}

// Exercice 2.2 : switch et mois courant

echo "<h2>Exercice 2.2 : Mois courant</h2>";

$mois = date("m");

switch ($mois) {
    case "01":
        $nom_mois = "Janvier";
        break;
    case "02":
        $nom_mois = "Février";
        break;
    case "03":
        $nom_mois = "Mars";
        break;
    case "04":
        $nom_mois = "Avril";
        break;
    case "05":
        $nom_mois = "Mai";
        break;
    case "06":
        $nom_mois = "Juin";
        break;
    case "07":
        $nom_mois = "Juillet";
        break;
    case "08":
        $nom_mois = "Août";
        break;
    case "09":
        $nom_mois = "Septembre";
        break;
    case "10":
        $nom_mois = "Octobre";
        break;
    case "11":
        $nom_mois = "Novembre";
        break;
    case "12":
        $nom_mois = "Décembre";
        break;
    default:
        $nom_mois = "Mois inconnu";
}

echo "Nous sommes au mois de $nom_mois.<br>";
// Sans break, PHP continue dans les cases suivants (fall-through).

// Exercice 2.3 : Boucles

// 1. Triangle avec deux boucles for imbriquées

echo "<h2>1. Triangle d'étoiles</h2>";

for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}

// 2. while : nombres de 0 à 20 par pas de 2

echo "<h2>2. Nombres pairs avec while</h2>";

$i = 0;

while ($i <= 20) {
    if ($i == 10) {
        echo "<strong>$i</strong><br>";
    } else {
        echo "$i<br>";
    }

    $i += 2;
}

// 3. for et continue : nombres pairs de 0 à 10

echo "<h2>3. Nombres pairs avec continue</h2>";

for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 != 0) {
        continue;
    }

    echo "$i<br>";
}

// 4. while, switch et break 2

echo "<h2>4. Utilisation de break 2</h2>";

$i = 1;

while ($i <= 12) {
    switch ($i) {
        case 5:
            echo "At 5<br>";
            break;

        case 10:
            echo "At 10; quitting<br>";
            break 2;

        default:
            echo "Nombre : $i<br>";
    }

    $i++;
}

// 5. do-while : nombres de 0 à 20 par pas de 2

echo "<h2>5. Nombres pairs avec do-while</h2>";

$i = 0;

do {
    if ($i == 10) {
        echo "<strong>$i</strong><br>";
    } else {
        echo "$i<br>";
    }

    $i += 2;
} while ($i <= 20);

// Différence : do-while s'exécute au moins une fois.
?>
