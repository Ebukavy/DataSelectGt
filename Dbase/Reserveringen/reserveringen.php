<?php
include '../db.php';

class Reservering {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function selectAllReserveringen() {
        try {
            $sql = "SELECT * FROM Reserveringen";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception("Fout bij het ophalen van tafelgegevens: " . $e->getMessage());
        }
    }

    public function insertReservering($klant_id, $product_id, $datum, $tijd, $aantal_personen) {
        try {
            $sql = "INSERT INTO Reserveringen (Klant_id, Product_id, Datum, Tijd, Aantal_personen) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$klant_id, $product_id, $datum, $tijd, $aantal_personen]);
            return true;
        } catch (Exception $e) {
            throw new Exception("Fout bij het invoegen van de reservering: " . $e->getMessage());
        }
    }
}    
?>
