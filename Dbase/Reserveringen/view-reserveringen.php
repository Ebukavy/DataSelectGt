<?php
include('reserveringen.php');
require_once('../db.php');
require_once('../header.php');

$reservering = new Reservering($myDb);

function displayReserveringOverview() {
    global $reservering;
    try {
        $stmt = $reservering->selectAllReserveringen();
        
        echo "<div class='container'>";
        echo "<h2>Reservering Overzicht</h2>";
        echo "<table class='table table-striped'>";
        echo "<thead class='thead-dark'><tr><th>Reservering ID</th><th>Klant ID</th><th>Product ID</th><th>Datum</th><th>Tijd</th><th>Aantal Personen</th><th>Acties</th></tr></thead>";
        echo "<tbody>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['Reservering_id']."</td>";
            echo "<td>".$row['Klant_id']."</td>";
            echo "<td>".$row['Product_id']."</td>";
            echo "<td>".$row['Datum']."</td>";
            echo "<td>".$row['Tijd']."</td>";
            echo "<td>".$row['Aantal_personen']."</td>";
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
        echo "Fout bij het ophalen van reserveringsgegevens: " . $e->getMessage();
    }
}

displayReserveringOverview();
?>
