<?php
include 'db.php';  // Assurez-vous que la connexion à la base de données est incluse

// Vérifier si le paramètre 'matStagiaire' est présent dans l'URL
if (isset($_GET['matStagiaire'])) {
    $matStagiaire = $_GET['matStagiaire'];

    // Préparer la requête SQL pour supprimer le stagiaire avec l'ID spécifique
    $sql = "DELETE FROM stagiaires WHERE matStagiaire = ?";

    // Préparer la requête
    if ($stmt = $conn->prepare($sql)) {
        // Lier le paramètre à la requête
        $stmt->bind_param("s", $matStagiaire);

        // Exécuter la requête
        if ($stmt->execute()) {
            echo "Le stagiaire a été supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppression du stagiaire : " . $stmt->error;
        }
        // Fermer la déclaration
        $stmt->close();
    } else {
        echo "Erreur dans la préparation de la requête.";
    }
} else {
    // Si aucun ID n'est passé dans l'URL
    echo "Aucun ID spécifié.";
}

$conn->close();  // Fermer la connexion à la base de données
?>
