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
    <a href="index1.php" class="btn btn-primary mb-3">Ajouter un Outil</a>
    
    <?php
    // Connexion à la base de données
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

    // Préparer et exécuter la requête
    $sql = "SELECT * FROM outils";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
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
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['type'], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($row['marque'], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($row['modele'], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($row['num_serie'], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($row['date_achat'], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($row['etat'], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($row['localisation'], ENT_QUOTES, 'UTF-8') . "</td>
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
