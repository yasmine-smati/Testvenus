<?php
// supprimer_employe.php

include 'db_connection.php'; // Inclure le fichier de connexion

// Vérifier si l'ID de l'employé a été passé
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Préparer la requête SQL
    $sqlDeleteEmploye = "DELETE FROM employes WHERE id = ?";
    
    // Préparer et lier
    if ($stmt = $conn->prepare($sqlDeleteEmploye)) {
        $stmt->bind_param("i", $id);
        
        // Exécuter la requête
        if ($stmt->execute()) {
            // Redirection vers la liste des employés après la suppression
            header("Location: liste_employes.php");
            exit();
        } else {
            echo "<div class='alert alert-danger mt-3'>Erreur lors de l'exécution de la requête : " . $stmt->error . "</div>";
        }
        
        // Fermer la déclaration
        $stmt->close();
    } else {
        echo "<div class='alert alert-danger mt-3'>Erreur lors de la préparation de la requête : " . $conn->error . "</div>";
    }
    
    // Fermer la connexion
    $conn->close();
} else {
    echo "<div class='alert alert-warning mt-3'>Aucun ID spécifié.</div>";
}
?>
