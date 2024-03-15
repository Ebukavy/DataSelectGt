<?php
include '../db.php';

class Product {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function selectAllProducten() {
        try {
            $sql = "SELECT * FROM Product";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception("Fout bij het ophalen van tafelgegevens: " . $e->getMessage());
        }
    }

    public function insertProduct($naam, $prijs, $categorie) {
        try {
            $sql = "INSERT INTO Product (Naam, Prijs, Categorie) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$naam, $prijs, $categorie]);
            return true;
        } catch (Exception $e) {
            throw new Exception("Fout bij het invoegen van het product: " . $e->getMessage());
        }
    }
    
}
?>
