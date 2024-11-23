<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">

    <title>Consulter un Stagiaire</title>
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
    <h2>Consulter un Stagiaire</h2>
    <form method="GET">
        <label>Matricule :</label>
        <input type="number" name="matStagiaire" required>
        <button type="submit">Rechercher</button>
    </form>

    <?php
    if (isset($_GET['matStagiaire'])) {
        $mat = $_GET['matStagiaire'];
        $result = $conn->query("SELECT * FROM stagiaires WHERE matStagiaire = $mat");

        if ($result->num_rows > 0) {
            $stagiaire = $result->fetch_assoc();
            echo "<p>Nom : " . $stagiaire['nomStagiaire'] . "</p>";
            echo "<p>Prénom : " . $stagiaire['prenomStagiaire'] . "</p>";
            echo "<p>Filière : " . $stagiaire['filiereStagiaire'] . "</p>";
            echo "<p>Année d'étude : " . $stagiaire['anneeEtude'] . "</p>";
        } else {
            echo "<p>Aucun stagiaire trouvé.</p>";
        }
    }
    ?>
</body>
</html>
