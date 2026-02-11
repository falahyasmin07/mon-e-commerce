<?php
/**
 * Classe de gestion de la connexion à la base de données
 * Pattern Singleton pour une seule instance
 */

class Database {
    // Configuration
    private const DB_HOST = 'localhost';
    private const DB_NAME = 'e-ecommerce';
    private const DB_USER = 'root';
    private const DB_PASS = ''; // Vide par défaut sur XAMPP
    
    private static ?Database $instance = null;
    private PDO $connection;
    
    /**
     * Constructeur privé (Singleton)
     */
    private function __construct() {
        try {
            $dsn = "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME . ";charset=utf8mb4";
            
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            
            $this->connection = new PDO($dsn, self::DB_USER, self::DB_PASS, $options);
            
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
    
    /**
     * Récupérer l'instance unique
     */
    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Récupérer la connexion PDO
     */
    public function getConnection(): PDO {
        return $this->connection;
    }
    
    // Empêcher le clonage
    private function __clone() {}
}