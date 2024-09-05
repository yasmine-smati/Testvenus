<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détails de l'Outil Ajouté</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Outil Ajouté avec Succès</h1>
    <p>Type: <?php echo htmlspecialchars($_GET['type'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p>Marque: <?php echo htmlspecialchars($_GET['marque'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p>Modèle: <?php echo htmlspecialchars($_GET['modele'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p>Numéro de série: <?php echo htmlspecialchars($_GET['num_serie'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p>Date d'achat: <?php echo htmlspecialchars($_GET['date_achat'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p>État: <?php echo htmlspecialchars($_GET['etat'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p>Localisation: <?php echo htmlspecialchars($_GET['localisation'], ENT_QUOTES, 'UTF-8'); ?></p>
    <a href="liste_outils.php" class="btn btn-primary">Retour à la Liste des Outils</a>
</div>
</body>
</html>
