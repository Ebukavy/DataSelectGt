<?php
include('klant.php');
require_once('../db.php');
require_once('../header.php');

$klant = new Klant($myDb);

function displayKlantOverview() {
    global $klant;
    try {
        $stmt = $klant->selectAllKlanten();
        
        echo "<div class='container'>";
        echo "<h2>Klant Overzicht</h2>";
        echo "<table class='table table-striped'>";
        echo "<thead class='thead-dark'><tr><th>Naam</th><th>Telefoonnummer</th><th>Email</th><th>Acties</th></tr></thead>";
        echo "<tbody>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['Naam']."</td>";
            echo "<td>".$row['Telefoonnummer']."</td>";
            echo "<td>".$row['Email']."</td>";
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
        echo "Fout bij het ophalen van klantgegevens: " . $e->getMessage();
    }
}

displayKlantOverview();
?>
