<?php
session_start();

// Rediriger si pas connecté
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Mon Profil - E-Commerce</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Bienvenue <?= $user['prenom'] ?> <?= $user['nom'] ?></h1>
    <p>Email : <?= $user['email'] ?></p>
    <a href="logout.php">Se déconnecter</a>
</div>
</body>
</html>

