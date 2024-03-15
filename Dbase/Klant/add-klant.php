<?php
include('klant.php');
require_once('../header.php');

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['naam']) && isset($_POST['telefoonnummer']) && isset($_POST['email'])) {
        $naam = $_POST['naam'];
        $telefoonnummer = $_POST['telefoonnummer'];
        $email = $_POST['email'];
        $klant = new Klant($myDb);
        $success = $klant->insertKlant($naam, $telefoonnummer, $email);
        if ($success) {
            $message = "Klant toegevoegd!";
        } else {
            $message = "Er is een fout opgetreden bij het toevoegen van de klant.";
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
    <title>Add Klant</title>
</head>
<body>
    <h1>Add Klant</h1>
    <?php if (!empty($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="add-klant.php" method="POST">
    <label for="naam">Klant Naam:</label>
    <input type="text" id="naam" name="naam">
    <label for="telefoonnummer">Telefoonnummer:</label>
    <input type="text" id="telefoonnummer" name="telefoonnummer">
    <label for="email">Email:</label>
    <input type="text" id="email" name="email">
    <button type="submit">Voeg Klant Toe</button>
</form>

</body>
</html>