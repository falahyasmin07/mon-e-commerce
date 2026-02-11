<?php
session_start();

// Simulation de produits (plus tard → base de données)
$produits = [
    [
        'id' => 1,
        'nom' => 'Clavier mécanique',
        'prix' => 89,99,
        'image' => 'https://via.placeholder.com/300x200?text=Clavier'
    ],
    [
        'id' => 2,
        'nom' => 'Casque gaming',
        'prix' => 99,99,
        'image' => 'https://via.placeholder.com/300x200?text=Casque'
    ],
    [
        'id' => 3,
        'nom' => 'Souris sans fil',
        'prix' => 49.99,
        'image' => 'https://via.placeholder.com/300x200?text=Souris'
    ]
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - E-Commerce BTS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #1e40af;
            color: white;
            padding: 20px;
            text-align: center;
        }

        nav {
            background-color: #111827;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        h2 {
            margin-bottom: 20px;
            color: #111827;
        }

        .produits {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .produit {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            text-align: center;
            padding-bottom: 15px;
        }

        .produit img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .produit h3 {
            margin: 15px 0 5px;
        }

        .produit p {
            font-weight: bold;
            color: #1e40af;
        }

        .produit form button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #1e40af;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        footer {
            background-color: #111827;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }
    </style>
</head>

<body>

<header>
    <h1>SHOP</h1>
</header>

<nav>
    <a href="index.php">Accueil</a>
    <a href="catalogue.php">Catalogue</a>
    <a href="fiche_produit.php">Fiche produit</a>
    <a href="panier.php">Panier</a>
    <a href="login.php">Compte Utilisateur</a>
</nav>

<div class="container">
    <h2>Produits populaires</h2>

    <div class="produits">
        <?php foreach ($produits as $produit): ?>
            <div class="produit">
                <img src="<?= $produit['image'] ?>" alt="<?= $produit['nom'] ?>">
                <h3><?= $produit['nom'] ?></h3>
                <p><?= $produit['prix'] ?> €</p>

                <form method="post" action="panier.php">
                    <input type="hidden" name="id" value="<?= $produit['id'] ?>">
                    <button type="submit">Ajouter au panier</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<footer>
    <p>&copy; <?= date('Y') ?> – Projet e-commerce BTS</p>
</footer>

</body>
</html>
