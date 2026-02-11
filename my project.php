<?php
session_start();

if (!isset($_SESSION['user'])) {
    // Connexion
    if (isset($_POST['login'])) {
        if ($_POST['email'] === 'test@test.fr' && $_POST['password'] === '1234') {
            $_SESSION['user'] = [
                'email' => $_POST['email']
            ];
            header('Location: compte.php');
            exit;
        } else {
            $erreur = "Identifiants incorrects";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Compte utilisateur</title>
</head>
<body>

<h1>Compte utilisateur</h1>

<?php if (!isset($_SESSION['user'])): ?>

    <!-- FORMULAIRE DE CONNEXION -->
    <?php if(isset($erreur)): ?>
        <p style="color:red"><?= $erreur ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Mot de passe" required><br><br>
        <button name="login">Se connecter</button>
    </form>

<?php else: ?>

    <!-- PROFIL UTILISATEUR -->
    <p>Connecté en tant que <strong><?= $_SESSION['user']['email'] ?></strong></p>

    <ul>
        <li><a href="panier.php">Mon panier</a></li>
        <li><a href="catalogue.php">Catalogue</a></li>
        <li><a href="logout.php">Déconnexion</a></li>
    </ul>

<?php endif; ?>

</body>
</html>
