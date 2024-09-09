<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des Employés</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Liste des Employés</h1>
    <a href="ajouter_employe.php" class="btn btn-primary mb-3">Ajouter un Employé</a>
    
    <?php
    include 'db_connection.php'; // Inclure le fichier de connexion

    // Préparer et exécuter la requête
    $sqlSelectEmployes = "SELECT * FROM employes";
    $resultEmployes = $conn->query($sqlSelectEmployes);

    if ($resultEmployes->num_rows > 0) {
        // Afficher les données dans un tableau
        echo "<table class='table table-striped'>";
        echo "<thead><tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Date d'embauche</th>
                <th>Actions</th>
              </tr></thead><tbody>";
        
        while ($employe = $resultEmployes->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($employe['id'], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($employe['nom'], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($employe['prenom'], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($employe['email'], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($employe['telephone'], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($employe['date_embauche'], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>
                        <a href='modifier_employe.php?id=" . $employe['id'] . "' class='btn btn-warning btn-sm'>Modifier</a>
                        <a href='supprimer_employe.php?id=" . $employe['id'] . "' class='btn btn-danger btn-sm'>Supprimer</a>
                    </td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>Aucun employé trouvé.</p>";
    }

    // Fermer la connexion
    $conn->close();
    ?>
</div>
</body>
</html>
