<?php
require_once __DIR__ . '/../config/database.php';

class Produit {
    private PDO $db;
    
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    
    /**
     * Récupérer tous les produits actifs
     */
    public function getAll() {
        $sql = "SELECT p.*, c.nom as categorie_nom 
                FROM produits p 
                LEFT JOIN categories c ON p.categorie_id = c.id
                WHERE p.actif = 1
                ORDER BY p.date_ajout DESC";
        
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }
    
    /**
     * Récupérer un produit par son ID
     */
    public function getById($id) {
        $sql = "SELECT p.*, c.nom as categorie_nom 
                FROM produits p 
                LEFT JOIN categories c ON p.categorie_id = c.id
                WHERE p.id = ? AND p.actif = 1";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    /**
     * Récupérer les produits par catégorie
     */
    public function getByCategorie($categorie_id) {
        $sql = "SELECT p.*, c.nom as categorie_nom 
                FROM produits p 
                LEFT JOIN categories c ON p.categorie_id = c.id
                WHERE p.categorie_id = ? AND p.actif = 1
                ORDER BY p.nom";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$categorie_id]);
        return $stmt->fetchAll();
    }
    
    /**
     * Rechercher des produits
     */
    public function search($keyword) {
        $sql = "SELECT p.*, c.nom as categorie_nom 
                FROM produits p 
                LEFT JOIN categories c ON p.categorie_id = c.id
                WHERE (p.nom LIKE ? OR p.description LIKE ?) 
                AND p.actif = 1";
        
        $searchTerm = "%$keyword%";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$searchTerm, $searchTerm]);
        return $stmt->fetchAll();
    }
    
    /**
     * Créer un nouveau produit (admin)
     */
    public function create($data) {
        $sql = "INSERT INTO produits (nom, description, prix, image, stock, categorie_id) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['nom'],
            $data['description'],
            $data['prix'],
            $data['image'],
            $data['stock'],
            $data['categorie_id']
        ]);
    }
    
    /**
     * Mettre à jour un produit
     */
    public function update($id, $data) {
        $sql = "UPDATE produits 
                SET nom = ?, description = ?, prix = ?, stock = ?, categorie_id = ?
                WHERE id = ?";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['nom'],
            $data['description'],
            $data['prix'],
            $data['stock'],
            $data['categorie_id'],
            $id
        ]);
    }
    
    /**
     * Supprimer un produit (désactivation logique)
     */
    public function delete($id) {
        $sql = "UPDATE produits SET actif = 0 WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}