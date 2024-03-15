<?php
include('Product.php');
require_once('../header.php');

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['naam']) && isset($_POST['prijs']) && isset($_POST['categorie'])) {
        $naam = $_POST['naam'];
        $prijs = $_POST['prijs'];
        $categorie = $_POST['categorie'];

        $product = new Product($myDb);

        $success = $product->insertProduct($naam, $prijs, $categorie);

        if ($success) {
            $message = "Product toegevoegd!";
        } else {
            $message = "Er is een fout opgetreden bij het toevoegen van het product: " . $e->getMessage();
        }
    } else {
        $message = "Niet alle vereiste velden zijn ingevuld.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <?php if (!empty($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="add-product.php" method="POST">
        <label for="naam">Product Naam:</label>
        <input type="text" id="naam" name="naam">
        <label for="prijs">Prijs:</label>
        <input type="text" id="prijs" name="prijs">
        <label for="categorie">Categorie:</label>
        <input type="text" id="categorie" name="categorie">
        <button type="submit">Voeg Product Toe</button>
    </form>
</body>
</html>
