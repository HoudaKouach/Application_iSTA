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
        <select name="filiereStagiaire" required>
            <option value="" disabled selected>-- Sélectionnez une filière --</option>
            <option value="DEV">Développement Informatique</option>
            <option value="AA">Assistant Administratif</option>
            <option value="ISd">Infrastructure Digitale</option>
            <option value="GE">Gestion d'Entreprise</option>
        </select>

        <label>Type de Bac :</label>
        <select id="typeBac" name="typeBac" onchange="toggleCustomBacField(this)" required>
            <option value="" disabled selected>-- Sélectionnez votre Bac --</option>
             <!-- Bacs Scientifiques -->
    <option value="SVT">Sciences de la Vie et de la Terre (SVT)</option>
    <option value="PC">Sciences Physiques et Chimiques (PC)</option>
    <option value="Mathématiques A">Mathématiques - Option A</option>
    <option value="Mathématiques B">Mathématiques - Option B</option>
    <option value="Sciences Agronomiques">Sciences Agronomiques</option>

    <!-- Bac Technique -->
    <option value="Sciences et Technologies Mécaniques">Sciences et Technologies Mécaniques</option>
    <option value="Sciences et Technologies Électriques">Sciences et Technologies Électriques</option>

    <!-- Bac Économique -->
    <option value="Sciences Économiques">Sciences Économiques</option>
    <option value="Gestion et Comptabilité">Gestion et Comptabilité</option>

    <!-- Bac Littéraire -->
    <option value="Lettres Modernes">Lettres Modernes</option>
    <option value="Lettres Anciennes">Lettres Anciennes</option>
    <option value="Langues">Langues Étrangères</option>

    <!-- Bac Professionnel -->
    <option value="Professionnel Industriel">Baccalauréat Professionnel Industriel</option>
    <option value="Professionnel Commercial">Baccalauréat Professionnel Commercial</option>
    <option value="Professionnel Agricole">Baccalauréat Professionnel Agricole</option>

    <!-- Bac International -->
    <option value="International - Français">Baccalauréat International (Option Français)</option>
    <option value="International - Anglais">Baccalauréat International (Option Anglais)</option>
            <option value="custom">Autre (Saisir votre Bac)</option>
        </select>

        <!-- Champ texte masqué par défaut -->
        <div id="customBacField" style="display: none; margin-top: 10px;">
            <label for="customBac">Spécifiez votre Bac :</label>
            <input type="text" id="customBac" name="customBac" placeholder="Ex : Baccalauréat Sportif">
        </div>

        <label>Année d'étude :</label>
        <input type="number" name="anneeEtude" required>

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
        $typeBac = $_POST['typeBac'] === 'custom' ? $_POST['customBac'] : $_POST['typeBac']; // Gérer le type de Bac
        $anneeBac = $_POST['anneeBac'];

        // Insertion dans la base de données
        $sql = "INSERT INTO stagiaires (nomStagiaire, prenomStagiaire, filiereStagiaire, anneeEtude, typeBac, anneeBac) 
                VALUES ('$nom', '$prenom', '$filiere', '$anneeEtude', '$typeBac', '$anneeBac')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Stagiaire ajouté avec succès !</p>";
        } else {
            echo "<p>Erreur : " . $conn->error . "</p>";
        }
    }
    ?>

    <script>
        function toggleCustomBacField(select) {
            const customField = document.getElementById('customBacField');
            const customInput = document.getElementById('customBac');

            // Afficher le champ texte si "Autre" est sélectionné, sinon le masquer
            if (select.value === 'custom') {
                customField.style.display = 'block';
                customInput.required = true; // Rendre ce champ obligatoire
            } else {
                customField.style.display = 'none';
                customInput.required = false; // Désactiver la contrainte obligatoire
                customInput.value = ''; // Réinitialiser la saisie
            }
        }
    </script>
</body>
</html>
