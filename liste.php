<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleNav.css">
    <link rel="stylesheet" href="index.css">
    <title>Liste des Stagiaires</title>
</head>
<body>
<h1 id="bar">Gestion des Stagiaires - ISTA</h1>

<h2>Liste des Stagiaires</h2>
<form method="GET">
    <label>Filière :</label>
    <input type="text" name="filiere">

    <label>Année d'étude :</label>
    <input type="number" name="anneeEtude">

    <button type="submit">Filtrer</button>
</form>

<?php
// Connexion à la base de données (assurez-vous que db.php est inclus)
$filiere = $_GET['filiere'] ?? null;
$anneeEtude = $_GET['anneeEtude'] ?? null;

$sql = "SELECT matStagiaire, nomStagiaire, prenomStagiaire, filiereStagiaire, anneeEtude FROM stagiaires WHERE 1=1";
$params = [];

if ($filiere) {
    $sql .= " AND filiereStagiaire = ?";
    $params[] = $filiere;
}

if ($anneeEtude) {
    $sql .= " AND anneeEtude = ?";
    $params[] = $anneeEtude;
}

// Préparer la requête
$stmt = $conn->prepare($sql);
if ($params) {
    $stmt->bind_param(str_repeat('s', count($params)), ...$params);
}
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Nom</th><th>Prénom</th><th>Filière</th><th>Année d'étude</th><th>Actions</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nomStagiaire']) . "</td>";
        echo "<td>" . htmlspecialchars($row['prenomStagiaire']) . "</td>";
        echo "<td>" . htmlspecialchars($row['filiereStagiaire']) . "</td>";
        echo "<td>" . htmlspecialchars($row['anneeEtude']) . "</td>";
        echo "<td>";
        // Exemple de la ligne pour Modifier et Supprimer
        echo "<a href='modifier1.php?matStagiaire=" . urlencode($row['matStagiaire']) . "' style='color:black;'>Modifier</a> | ";
        echo "<a href='supprimer.php?matStagiaire=" . urlencode($row['matStagiaire']) . "' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer ce stagiaire ?');\">Supprimer</a>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Aucun stagiaire trouvé.</p>";
}
?>
</body>
</html>
