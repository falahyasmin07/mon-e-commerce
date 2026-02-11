<?php
session_start();

$produits = [
    1 => ['nom'=>'Clavier mécanique','prix'=>89.99,'image'=>'https://via.placeholder.com/400x250?text=Clavier','description'=>'Clavier RGB mécanique idéal pour le gaming'],
    2 => ['nom'=>'Casque gaming','prix'=>129.99,'image'=>'https://via.placeholder.com/400x250?text=Casque','description'=>'Casque surround avec micro'],
    3 => ['nom'=>'Souris sans fil','prix'=>49.99,'image'=>'https://via.placeholder.com/400x250?text=Souris','description'=>'Souris ergonomique sans fil'],
];

if (!isset($_GET['id']) || !isset($produits[$_GET['id']])) {
    echo "Produit introuvable";
    exit;
}

$p = $produits[$_GET['id']];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title><?= $p['nom'] ?></title>
</head>
<body>

<a href="catalogue.php">← Retour au catalogue</a>

<h1><?= $p['nom'] ?></h1>
<img src="<?= $p['image'] ?>" width="400">
<p><?= $p['description'] ?></p>
<p><strong><?= $p['prix'] ?> €</strong></p>

<form method="post" action="panier.php">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <input type="hidden" name="nom" value="<?= $p['nom'] ?>">
    <input type="hidden" name="prix" value="<?= $p['prix'] ?>">
    <button type="submit" name="ajouter">Ajouter au panier</button>
</form>

</body>
</html>
