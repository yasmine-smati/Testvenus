<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des Outils</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Liste des Outils</h1>
    <a href="ajouter_outil_informatique.php" class="btn btn-primary mb-3">Ajouter un Outil</a>
    
    <?php
    include 'db_connection.php'; // Inclure le fichier de connexion

    // Préparer et exécuter la requête
    $sqlSelectOutils = "SELECT * FROM outils";
    $resultOutils = $conn->query($sqlSelectOutils);

    if ($resultOutils->num_rows > 0) {
        // Afficher les données dans un tableau
        echo "<table class='table table-striped'>";
        echo "<thead><tr>
                <th>Type</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Numéro de série</th>
                <th>Date d'achat</th>
                <th>État</th>
                <th>Localisation</th>
              </tr></thead><tbody>";
        
        while ($outil = $resultOutils->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($outil['type'], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($outil['marque'], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($outil['modele'], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($outil['num_serie'], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($outil['date_achat'], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($outil['etat'], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($outil['localisation'], ENT_QUOTES, 'UTF-8') . "</td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>Aucun outil trouvé.</p>";
    }

    // Fermer la connexion
    $conn->close();
    ?>
</div>
</body>
</html>
