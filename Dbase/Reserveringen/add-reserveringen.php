<?php
include('reserveringen.php');
require_once('../header.php');

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['klant_id']) && isset($_POST['product_id']) && isset($_POST['datum']) && isset($_POST['tijd']) && isset($_POST['aantal_personen'])) {
        $klant_id = $_POST['klant_id'];
        $product_id = $_POST['product_id'];
        $datum = $_POST['datum'];
        $tijd = $_POST['tijd'];
        $aantal_personen = $_POST['aantal_personen'];

        $reservering = new Reservering($myDb);

        $success = $reservering->insertReservering($klant_id, $product_id, $datum, $tijd, $aantal_personen);

        if ($success) {
            $message = "Reservering toegevoegd!";
        } else {
            $message = "Er is een fout opgetreden bij het toevoegen van de reservering.";
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
    <title>Voeg Reservering Toe</title>
</head>
<body>
    <h1>Voeg Reservering Toe</h1>
    <?php if (!empty($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="add-reserveringen.php" method="POST">
        <label for="klant_id">Klant ID:</label>
        <input type="text" id="klant_id" name="klant_id">
        <label for="product_id">Product ID:</label>
        <input type="text" id="product_id" name="product_id">
        <label for="datum">Datum:</label>
        <input type="text" id="datum" name="datum">
        <label for="tijd">Tijd:</label>
        <input type="text" id="tijd" name="tijd">
        <label for="aantal_personen">Aantal Personen:</label>
        <input type="text" id="aantal_personen" name="aantal_personen">
        <button type="submit">Voeg Reservering Toe</button>
    </form>
</body>
</html>
