<?php
// traitement_ajout_outil.php

include 'db_connection.php'; // Inclure le fichier de connexion

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $outilType = $_POST['type'];
    $outilMarque = $_POST['marque'];
    $outilModele = $_POST['modele'];
    $outilNumSerie = $_POST['num_serie'];
    $outilDateAchat = $_POST['date_achat'];
    $outilEtat = $_POST['etat'];
    $outilLocalisation = $_POST['localisation'];

    // Préparer la requête SQL
    $sqlInsertOutil = "INSERT INTO outils (type, marque, modele, num_serie, date_achat, etat, localisation) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    // Préparer et lier
    if ($stmt = $conn->prepare($sqlInsertOutil)) {
        $stmt->bind_param("sssssss", $outilType, $outilMarque, $outilModele, $outilNumSerie, $outilDateAchat, $outilEtat, $outilLocalisation);
        
        // Exécuter la requête
        if ($stmt->execute()) {
            // Redirection vers la page de confirmation après l'ajout
            header("Location: confirmation.php?type=$outilType&marque=$outilMarque&modele=$outilModele&num_serie=$outilNumSerie&date_achat=$outilDateAchat&etat=$outilEtat&localisation=$outilLocalisation");
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
    echo "<div class='alert alert-warning mt-3'>Aucune donnée reçue.</div>";
}
?>
