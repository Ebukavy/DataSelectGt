<?php
include '../db.php';

class Tafel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function selectAllTafels() {
        try {
            $sql = "SELECT * FROM Tafel";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception("Fout bij het ophalen van tafelgegevens: " . $e->getMessage());
        }
    }
    public function insertTafel($naam, $nummer, $capaciteit) {
        try {
            $sql = "INSERT INTO Tafel (Naam, Nummer, Capaciteit) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$naam, $nummer, $capaciteit]);
            return true;
        } catch (Exception $e) {
            return false; 
        }
    }
}    
?>
