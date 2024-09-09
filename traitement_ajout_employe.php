<?php
// traitement_ajout_employe.php

include 'db_connection.php'; // Inclure le fichier de connexion

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $date_embauche = $_POST['date_embauche'];

    // Préparer la requête SQL
    $sqlInsertEmploye = "INSERT INTO employes (nom, prenom, email, telephone, date_embauche) VALUES (?, ?, ?, ?, ?)";
    
    // Préparer et lier
    if ($stmt = $conn->prepare($sqlInsertEmploye)) {
        $stmt->bind_param("sssss", $nom, $prenom, $email, $telephone, $date_embauche);
        
        // Exécuter la requête
        if ($stmt->execute()) {
            // Redirection vers la liste des employés après l'ajout
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
    echo "<div class='alert alert-warning mt-3'>Aucune donnée reçue.</div>";
}
?>
