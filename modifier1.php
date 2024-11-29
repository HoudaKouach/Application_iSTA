<?php
include 'db.php';

// Vérifiez si le paramètre matStagiaire est présent dans l'URL
if (isset($_GET['matStagiaire'])) {
    $matStagiaire = $_GET['matStagiaire'];
    // Vous pouvez maintenant utiliser $matStagiaire pour récupérer ou modifier les informations dans la base de données
    echo "ID du stagiaire : " . htmlspecialchars($matStagiaire);
} else {
    echo "Aucun ID spécifié.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un stagiaire</title>
</head>
<body>
    <h1>Modifier les informations du stagiaire</h1>
    <form method="POST">
        <label>Nom :</label>
        <input type="text" name="nom" value="<?= htmlspecialchars($stagiaire['nomStagiaire']) ?>" required><br>
        <label>Prénom :</label>
        <input type="text" name="prenom" value="<?= htmlspecialchars($stagiaire['prenomStagiaire']) ?>" required><br>
        <label>Filière :</label>
        <input type="text" name="filiere" value="<?= htmlspecialchars($stagiaire['filiereStagiaire']) ?>" required><br>
        <label>Année d'étude :</label>
        <input type="number" name="anneeEtude" value="<?= htmlspecialchars($stagiaire['anneeEtude']) ?>" required><br>
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>

