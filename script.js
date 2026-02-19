document.addEventListener('DOMContentLoaded', ()=>{
    const addLinks = document.querySelectorAll('a[href*="action=add"]');
    addLinks.forEach(link=>{
        link.addEventListener('click', e=>{
            e.preventDefault();
            alert("Produit ajouté au panier !");
            window.location.href = link.href;
        });
    });
});
