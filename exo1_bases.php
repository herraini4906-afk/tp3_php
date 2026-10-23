
<?php
// Auteur : Hiba
// Objectif : Variables, constantes, types et chaînes
// Date : 23/10/2026

require 'config.php';

// Exercice 1.1 : Variables
$x = 10;
$_x = 20;
$Prix_HT = 60;
$état = "Maroc";

// $2x : invalide, car une variable ne commence pas par un chiffre.
// $x-y : invalide, car le tiret n'est pas autorisé dans un nom.
// $prix ht : invalide, car un espace est interdit.

$a = 5;
$A = 15;
echo "<h3>Exercice 1.1</h3>";
echo "a = $a et A = $A<br>";

// Exercice 1.2 : Constantes
echo "<h3>Exercice 1.2</h3>";
echo ETABLISSEMENT . "<br>";
echo NOTE_MIN . "<br>";
echo NOTE_MAX . "<br>";
echo SEUIL . "<br>";

var_dump(defined('SEUIL'));
echo "<br>";
var_dump(defined('INCONNUE'));
echo "<br>";

// Exercice 1.3 : Calcul
echo "<h3>Exercice 1.3</h3>";
$prix_ht = 60;
$tva = 20;
$prix_ttc = $prix_ht + ($prix_ht * $tva / 100);

echo "Le prix TTC du produit est de " . $prix_ttc . " €.<br>";

// Exercice 1.4 : Types et conversions
echo "<h3>Exercice 1.4</h3>";
$test = 42;
$test = (string) $test;
var_dump($test);
echo "<br>";

var_dump((bool) 0);
var_dump((bool) 0.0);
var_dump((bool) "0");
var_dump((bool) "");
var_dump((bool) "abc");
var_dump((bool) []);
var_dump((bool) null);
echo "<br>";

var_dump((int) 3.9);
var_dump((int) "12abc");
var_dump((float) "1.5e3");
var_dump((int) true);
echo "<br>";

$decimal = 255;
$hexadecimal = dechex(255);
$octal = decoct(255);
$binaire = decbin(255);

echo "Décimal : $decimal<br>";
echo "Hexadécimal : $hexadecimal<br>";
echo "Octal : $octal<br>";
echo "Binaire : $binaire<br>";

// Exercice 1.5 : Chaînes
echo "<h3>Exercice 1.5</h3>";

$traitees = "égales à";
$ici = 2;

echo 'Ahmed a dit : "J\'ai réussi"<br>';
echo 'Voulez-vous supprimer C:\*.*?<br>';
echo 'Ceci n\'affichera pas \n de nouvelle ligne<br>';
echo 'Les variables ne seront pas $traitees $ici<br>';
echo "Les variables seront $traitees $ici<br>";

$chaine = "*Bonjour les développeurs*";
echo trim($chaine, "*") . "<br>";

$mot = "PHP";
for ($i = 0; $i < strlen($mot); $i++) {
    echo $mot[$i] . "<br>";
}
?>
