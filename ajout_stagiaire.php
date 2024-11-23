<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Ajouter un Stagiaire</title>
</head>
<body>
    <h2>Ajouter un Stagiaire</h2>
    <form action="ajout_stagiaire.php" method="POST">
        <label>Nom :</label>
        <input type="text" name="nomStagiaire" required>
        
        <label>Prénom :</label>
        <input type="text" name="prenomStagiaire" required>

        <label>Filière :</label>
        <input type="text" name="filiereStagiaire" required>

        <label>Année d'étude :</label>
        <input type="number" name="anneeEtude" required>

        <label>Type de Bac :</label>
        <input type="text" name="typeBac">

        <label>Année du Bac :</label>
        <input type="number" name="anneeBac">

        <button type="submit">Ajouter</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nomStagiaire'];
        $prenom = $_POST['prenomStagiaire'];
        $filiere = $_POST['filiereStagiaire'];
        $anneeEtude = $_POST['anneeEtude'];
        $typeBac = $_POST['typeBac'];
        $anneeBac = $_POST['anneeBac'];

        $sql = "INSERT INTO stagiaires (nomStagiaire, prenomStagiaire, filiereStagiaire, anneeEtude, typeBac, anneeBac) 
                VALUES ('$nom', '$prenom', '$filiere', '$anneeEtude', '$typeBac', '$anneeBac')";

        if ($conn->query($sql) === TRUE) {
            echo "Stagiaire ajouté avec succès !";
        } else {
            echo "Erreur : " . $conn->error;
        }
    }
    ?>
</body>
</html>
