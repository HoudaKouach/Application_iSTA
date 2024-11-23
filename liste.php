<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">

    <title>Liste des Stagiaires</title>
</head>
<body>
<h1 id="bar">Gestion des Stagiaires - ISTA</h1>
    <nav>
        <img src="dff215f1e5690e1baa3a7bcb8bb5c9e1.png" class="logo" alt="logo">
        <ul>
            <li><a href="index.html">Page Principale </a></li>
            <li><a href="ajout_stagiaire.php">Ajouter </a></li>
            <li><a href="consulter.php">Consulter </a></li>
            <li><a href="modifier.php">Modifier </a></li>
            <li><a href="liste.php">Liste</a></li>
        </ul>
    </nav>
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
