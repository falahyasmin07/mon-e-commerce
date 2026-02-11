<?php
session_start();
require_once 'config/database.php';
require_once 'includes/functions.php';
require_once 'models/Produit.php';
require_once 'models/Categorie.php';

// Router simple
$page = $_GET['page'] ?? 'accueil';

// Instancier les modèles
$produitModel = new Produit();
$categorieModel = new Categorie();

// Charger la vue appropriée
switch ($page) {
    case 'accueil':
        $produits = $produitModel->getAll();
        $categories = $categorieModel->getAll();
        $view = 'views/pages/accueil.php';
        break;
        
    case 'produits':
        $produits = $produitModel->getAll();
        $categories = $categorieModel->getAll();
        $view = 'views/pages/produits.php';
        break;
        
    case 'produit':
        $id = $_GET['id'] ?? 0;
        $produit = $produitModel->getById($id);
        $view = 'views/pages/produit-detail.php';
        break;
        
    case 'panier':
        $view = 'views/pages/panier.php';
        break;
        
    default:
        $view = 'views/pages/accueil.php';
}

// Inclure le layout
include 'views/layout/header.php';
include $view;
include 'views/layout/footer.php';