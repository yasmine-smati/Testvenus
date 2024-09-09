<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier un Employé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Modifier un Employé</h1>
    <?php
    include 'db_connection.php'; // Inclure le fichier de connexion

    // Récupérer l'ID de l'employé à modifier
    $id = $_GET['id'];

    // Préparer et exécuter la requête
    $sqlSelectEmploye = "SELECT * FROM employes WHERE id = ?";
    if ($stmt = $conn->prepare($sqlSelectEmploye)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($employe = $result->fetch_assoc()) {
            ?>
            <form action="traitement_modifier_employe.php" method="post">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($employe['id'], ENT_QUOTES, 'UTF-8'); ?>">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom :</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlspecialchars($employe['nom'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom :</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo htmlspecialchars($employe['prenom'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($employe['email'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="telephone" class="form-label">Téléphone :</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo htmlspecialchars($employe['telephone'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="mb-3">
                    <label for="date_embauche" class="form-label">Date d'embauche :</label>
                    <input type="date" class="form-control" id="date_embauche" name="date_embauche" value="<?php echo htmlspecialchars($employe['date_embauche'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
            <?php
        } else {
            echo "<p>Employé non trouvé.</p>";
        }
        $stmt->close();
    } else {
        echo "<div class='alert alert-danger mt-3'>Erreur lors de la préparation de la requête : " . $conn->error . "</div>";
    }

    // Fermer la connexion
    $conn->close();
    ?>
</div>
</body>
</html>
