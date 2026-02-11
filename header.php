<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce BTS - Tech Shop</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <div class="logo">
                    <a href="index.php">🛒 TechShop</a>
                </div>
                
                <ul class="nav-menu">
                    <li><a href="index.php?page=accueil">Accueil</a></li>
                    <li><a href="index.php?page=produits">Produits</a></li>
                    <li><a href="index.php?page=panier">Panier 
                        <?php if (isset($_SESSION['panier']) && count($_SESSION['panier']) > 0): ?>
                            <span class="badge"><?= count($_SESSION['panier']) ?></span>
                        <?php endif; ?>
                    </a></li>
                    
                    <?php if (isLoggedIn()): ?>
                        <li><a href="index.php?page=compte">Mon compte</a></li>
                        <?php if (isAdmin()): ?>
                            <li><a href="index.php?page=admin">Admin</a></li>
                        <?php endif; ?>
                        <li><a href="index.php?page=logout">Déconnexion</a></li>
                    <?php else: ?>
                        <li><a href="index.php?page=login">Connexion</a></li>
                        <li><a href="index.php?page=register">Inscription</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    
    <main class="container">
        <?php if ($success = getFlashMessage('success')): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>
        
        <?php if ($error = getFlashMessage('error')): ?>
            <div class="alert alert-error"><?= $error ?></div>
        <?php endif; ?>