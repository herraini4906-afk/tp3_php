
<?php
// Auteur : Hiba
// Objectif : Connexion de l'utilisateur
// Date : 23/10/2026

error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

$erreur = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $identifiant = trim($_POST["identifiant"] ?? "");
    $motDePasse = $_POST["mot_de_passe"] ?? "";

    // Identifiants de test pour le TP
    if ($identifiant === "hiba" && $motDePasse === "1234") {
        session_regenerate_id(true);
        $_SESSION["utilisateur"] = $identifiant;

        header("Location: profil.php");
        exit;
    } else {
        $erreur = "Identifiant ou mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Suivi des notes des apprenants</h1>
    <h2>Connexion</h2>

    <?php if ($erreur !== ""): ?>
        <p style="color: red;">
            <?= htmlspecialchars($erreur, ENT_QUOTES, 'UTF-8') ?>
        </p>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <p>
            <label for="identifiant">Identifiant :</label><br>
            <input type="text" id="identifiant"
                   name="identifiant" required>
        </p>

        <p>
            <label for="mot_de_passe">Mot de passe :</label><br>
            <input type="password" id="mot_de_passe"
                   name="mot_de_passe" required>
        </p>

        <button type="submit">Se connecter</button>
        <button type="reset">Effacer</button>
    </form>

    <p><a href="exo3_tableaux.php">Retour à l'exercice 3</a></p>
    <p><a href="saisie.html">Saisie des notes</a></p>
</body>
</html>
