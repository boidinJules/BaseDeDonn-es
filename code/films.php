<?php
require 'db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Film introuvable.");
}

$id_film = $_GET['id'];

// Récupérer les infos du film
$sql = "SELECT 
            f.titre, f.annee, f.resume, a.nom AS realisateur 
        FROM Film f
        LEFT JOIN Artiste a ON f.id_realisateur = a.id
        WHERE f.id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_film]);
$film = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$film) {
    die("Film introuvable.");
}

// Récupérer les acteurs du film
$sql_acteurs = "SELECT ar.nom, ar.prenom, j.role 
                FROM Jouer j
                JOIN Artiste ar ON j.id_artiste = ar.id
                WHERE j.id_film = ?";
$stmt = $pdo->prepare($sql_acteurs);
$stmt->execute([$id_film]);
$acteurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérer la note moyenne
$sql_note = "SELECT AVG(note) AS moyenne FROM Noter WHERE id_film = ?";
$stmt = $pdo->prepare($sql_note);
$stmt->execute([$id_film]);
$note = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($film['titre']) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<a href="index.php" class="btn">← Retour</a>

<h1><?= htmlspecialchars($film['titre']) ?> (<?= date('Y', strtotime($film['annee'])) ?>)</h1>
<p><strong>Réalisé par :</strong> <?= htmlspecialchars($film['realisateur']) ?></p>
<p><strong>Résumé :</strong> <?= nl2br(htmlspecialchars($film['resume'])) ?></p>

<h2>Acteurs</h2>
<ul>
    <?php foreach ($acteurs as $acteur): ?>
        <li><?= htmlspecialchars($acteur['prenom'] . " " . $acteur['nom']) ?> - <?= htmlspecialchars($acteur['role']) ?></li>
    <?php endforeach; ?>
</ul>

<h2>Note Moyenne</h2>
<p><?= $note['moyenne'] ? round($note['moyenne'], 1) . " / 10" : "Pas encore noté" ?></p>

</body>
</html>
