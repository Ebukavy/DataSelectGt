<?php
include('rekening.php');
require_once('../db.php');
require_once('../header.php');

$rekening = new Rekening($myDb);

function displayRekeningOverview() {
    global $rekening;
    try {
        $stmt = $rekening->selectAllRekeningen();
        
        echo "<div class='container'>";
        echo "<h2>Rekening Overzicht</h2>";
        echo "<table class='table table-striped'>";
        echo "<thead class='thead-dark'><tr><th>Rekening ID</th><th>Totaal Bedrag</th><th>Betaald</th><th>Acties</th></tr></thead>";
        echo "<tbody>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['Rekening_id']."</td>";
            echo "<td>".$row['Totaal_bedrag']."</td>";
            echo "<td>".$row['Betaald']."</td>";
            echo "<td>";
            echo "<button class='btn btn-primary btn-sm'>Edit</button>";
            echo "<button class='btn btn-danger btn-sm'>Delete</button>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } catch (Exception $e) {
        echo "Fout bij het ophalen van rekeninggegevens: " . $e->getMessage();
    }
}

displayRekeningOverview();
?>
