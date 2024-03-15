<?php
include '../db.php';

class Rekening {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

   public function selectAllRekeningen() {
    try {
        $sql = "SELECT * FROM Rekening";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt;
    } catch (PDOException $e) {
        throw new Exception("Fout bij het ophalen van tafelgegevens: " . $e->getMessage());
    }
}

    public function insertRekening($totaal_bedrag, $betaald) {
        try {
            $sql = "INSERT INTO Rekening (Totaal_bedrag, Betaald) VALUES (?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$totaal_bedrag, $betaald]);
            return true;
        } catch (Exception $e) {
            return false; 
        }
    }
}    
?>
