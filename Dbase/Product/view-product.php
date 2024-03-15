<?php
include('product.php');
require_once('../db.php');
require_once('../header.php');

$product = new Product($myDb);

function displayProductOverview() {
    global $product;
    try {
        $stmt = $product->selectAllProducten();
        
        echo "<div class='container'>";
        echo "<h2>Product Overzicht</h2>";
        echo "<table class='table table-striped'>";
        echo "<thead class='thead-dark'><tr><th>Naam</th><th>Prijs</th><th>Categorie</th><th>Acties</th></tr></thead>";
        echo "<tbody>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['Naam']."</td>";
            echo "<td>".$row['Prijs']."</td>";
            echo "<td>".$row['Categorie']."</td>";
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
        echo "Fout bij het ophalen van productgegevens: " . $e->getMessage();
    }
}

displayProductOverview();
?>
