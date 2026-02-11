// Exemple : alerte pour bouton "Ajouter au panier"
document.querySelectorAll('.produit button').forEach(btn => {
    btn.addEventListener('click', () => {
        alert("Produit ajouté au panier !");
    });
});

// Exemple : bouton "Détails" commandes
document.querySelectorAll('.commande button').forEach(btn => {
    btn.addEventListener('click', () => {
        alert("Voir les détails de la commande !");
    });
});
