<?php
require 'db.php';

// Récupérer les films avec leur réalisateur et genres
$sql = "SELECT 
            f.id, f.titre, f.annee, a.nom AS realisateur, 
            GROUP_CONCAT(g.libelle SEPARATOR ', ') AS genres 
        FROM Film f
        LEFT JOIN Artiste a ON f.id_realisateur = a.id
        LEFT JOIN Appartenir ap ON f.id = ap.id_film
        LEFT JOIN Genre g ON ap.id_genre = g.id
        GROUP BY f.id";

$stmt = $pdo->query($sql);
$films = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Liste des Films</h1>

<div class="films-container">
    <?php foreach ($films as $film): ?>
        <div class="film-card">
            <h2><?= htmlspecialchars($film['titre']) ?> (<?= date('Y', strtotime($film['annee'])) ?>)</h2>
            <p><strong>Réalisé par :</strong> <?= htmlspecialchars($film['realisateur']) ?></p>
            <p><strong>Genres :</strong> <?= htmlspecialchars($film['genres']) ?></p>
            <a href="films.php?id=<?= $film['id'] ?>" class="btn">Voir détails</a>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
