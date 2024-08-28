<?php


// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $type = $_POST['type'];
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $num_serie = $_POST['num_serie'];
    $date_achat = $_POST['date_achat'];
    $etat = $_POST['etat'];
    $localisation = $_POST['localisation'];

    // Préparer la requête SQL
    $sql = "INSERT INTO outils (type, marque, modele, num_serie, date_achat, etat, localisation) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    // Préparer et lier
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssss", $type, $marque, $modele, $num_serie, $date_achat, $etat, $localisation);
        
        // Exécuter la requête
        if ($stmt->execute()) {
            echo "L'outil a été ajouté avec succès.";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . $stmt->error;
        }
        
        // Fermer la déclaration
        $stmt->close();
    } else {
        echo "Erreur lors de la préparation de la requête : " . $conn->error;
    }
    
    // Fermer la connexion
    $conn->close();
} else {
    echo "Méthode de requête non valide.";
}
?>
