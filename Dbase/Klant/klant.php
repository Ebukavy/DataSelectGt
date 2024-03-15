<?php
include '../db.php';

class Klant {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }


    public function selectAllKlanten() {
        try {
            $sql = "SELECT * FROM Klant";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception("Fout bij het ophalen van tafelgegevens: " . $e->getMessage());
        }
    }
    
    public function insertKlant($naam, $telefoonnummer, $email) {
        try {
            $sql = "INSERT INTO Klant (Naam, Telefoonnummer, Email) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$naam, $telefoonnummer, $email]);
            return true;
        } catch (Exception $e) {
            return false; 
        }
    }
}    
?>
