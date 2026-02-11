<?php
session_start();

$produits = [
    ['id'=>1,'nom'=>'Clavier mécanique','prix'=>89.99,'image'=>'https://via.placeholder.com/300x200?text=Clavier'],
    ['id'=>2,'nom'=>'Casque gaming','prix'=>99.99,'image'=>'https://via.placeholder.com/300x200?text=Casque'],
    ['id'=>3,'nom'=>'Souris sans fil','prix'=>49.99,'image'=>'https://via.placeholder.com/300x200?text=Souris'],
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Catalogue</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f1f5f9;
    margin: 0;
}

header {
    background: linear-gradient(90deg, #1e3a8a, #2563eb);
    color: white;
    padding: 25px;
    text-align: center;
}

nav {
    background-color: #111827;
    padding: 12px;
    text-align: center;
}

nav a {
    color: #e5e7eb;
    margin: 0 15px;
    text-decoration: none;
    font-weight: bold;
}

nav a:hover {
    color: #60a5fa;
}

.container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 20px;
}

.produits {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
}

.produit {
    background: white;
    border-radius: 12px;
    box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    overflow: hidden;
    transition: transform 0.3s;
}

.produit:hover {
    transform: translateY(-5px);
}

.produit img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.produit-content {
    padding: 20px;
    text-align: center;
}

.produit-content h3 a {
    text-decoration: none;
    color: #1e3a8a;
}

.produit-content h3 a:hover {
    text-decoration: underline;
}

.prix {
    font-size: 1.4em;
    font-weight: bold;
    color: #2563eb;
    margin: 10px 0;
}

button {
    background-color: #2563eb;
    color: white;
    border: none;
    padding: 10px 18px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1em;
}

button:hover {
    background-color: #1e40af;
}

footer {
    background-color: #111827;
    color: #9ca3af;
    text-align: center;
    padding: 20px;
    margin-top: 50px;
}
</style>
</head>

<body>

<header>
    <h1>Catalogue produits</h1>
    <p>Découvrez nos meilleures offres</p>
</header>

<nav>
    <a href="index.php">Accueil</a>
    <a href="catalogue.php">Catalogue</a>
    <a href="panier.php">Panier</a>
    <a href="compte.php">Compte</a>
</nav>

<div class="container">
    <div class="produits">
        <?php foreach($produits as $p): ?>
            <div class="produit">
                <img src="<?= $p['image'] ?>" alt="<?= $p['nom'] ?>">

                <div class="produit-content">
                    <h3>
                        <a href="fiche_produit.php?id=<?= $p['id'] ?>">
                            <?= $p['nom'] ?>
                        </a>
                    </h3>

                    <div class="prix"><?= $p['prix'] ?> €</div>

                    <form method="post" action="panier.php">
                        <input type="hidden" name="id" value="<?= $p['id'] ?>">
                        <input type="hidden" name="nom" value="<?= $p['nom'] ?>">
                        <input type="hidden" name="prix" value="<?= $p['prix'] ?>">
                        <button type="submit" name="ajouter">Ajouter au panier</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<footer>
    <p>&copy; <?= date('Y') ?> – Projet e-commerce BTS</p>
</footer>

</body>
</html>
