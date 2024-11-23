<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Liste des Stagiaires</title>
</head>
<body>
    <h2>Liste des Stagiaires</h2>
    <form method="GET">
        <label>Filière :</label>
        <input type="text" name="filiere">
        
        <label>Année d'étude :</label>
        <input type="number" name="anneeEtude">

        <button type="submit">Filtrer</button>
    </form>

    <?php
    $filiere = $_GET['filiere'] ?? null;
    $anneeEtude = $_GET['anneeEtude'] ?? null;

    $sql = "SELECT * FROM stagiaires WHERE 1=1";
    if ($filiere) $sql .= " AND filiereStagiaire = '$filiere'";
    if ($anneeEtude) $sql .= " AND anneeEtude = '$anneeEtude'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>" . $row['nomStagiaire'] . " " . $row['prenomStagiaire'] . " - " . $row['filiereStagiaire'] . "</p>";
        }
    } else {
        echo "<p>Aucun stagiaire trouvé.</p>";
    }
    ?>
</body>
</html>
