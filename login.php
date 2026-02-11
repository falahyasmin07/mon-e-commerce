<?php
session_start();

// Utilisateurs simulés
$users = [
    ['email' => 'jean.dupont@example.com', 'password' => '123456', 'prenom' => 'Jean', 'nom' => 'Dupont'],
    ['email' => 'alice@example.com', 'password' => 'abcdef', 'prenom' => 'Alice', 'nom' => 'Martin']
];

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Vérification simple
    foreach($users as $user) {
        if ($user['email'] === $email && $user['password'] === $password) {
            $_SESSION['user'] = $user;
            header('Location: profil.php');
            exit;
        }
    }
    $error = "Email ou mot de passe incorrect";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Connexion - E-Commerce</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
    <h1>Connexion</h1>
    <?php if($error): ?>
        <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST">
        <label>Email</label>
        <input type="email" name="email" required>
        <label>Mot de passe</label>
        <input type="password" name="password" required>
        <button type="submit">Se connecter</button>
    </form>
</div>
</body>
</html>
