<?php
include('tafel.php');
require_once('../db.php');
require_once('../header.php');

// Create Tafel instance
$tafel = new Tafel($myDb);

// Function to fetch and display tafel data
function displayTafelOverview() {
    global $tafel;
    try {
        // Execute SELECT query to retrieve tafel data
        $stmt = $tafel->selectAllTafels();
        
        // Display tafel data in a table with Bootstrap styling
        echo "<div class='container'>";
        echo "<h2>Tafel Overzicht</h2>";
        echo "<table class='table table-striped'>";
        echo "<thead class='thead-dark'><tr><th>Tafel ID</th><th>Naam</th><th>Nummer</th><th>Capaciteit</th><th>Acties</th></tr></thead>";
        echo "<tbody>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['Tafel_id']."</td>";
            echo "<td>".$row['Naam']."</td>";
            echo "<td>".$row['Nummer']."</td>";
            echo "<td>".$row['Capaciteit']."</td>";
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
        echo "Fout bij het ophalen van tafelgegevens: " . $e->getMessage();
    }
}

// Display tafel overview
displayTafelOverview();
?>
