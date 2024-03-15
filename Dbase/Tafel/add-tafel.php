<?php
include('tafel.php');
require_once('../header.php');

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['naam']) && isset($_POST['nummer']) && isset($_POST['capaciteit'])) {
        $naam = $_POST['naam'];
        $nummer = $_POST['nummer'];
        $capaciteit = $_POST['capaciteit'];

        $tafel = new Tafel($myDb);

        $success = $tafel->insertTafel($naam, $nummer, $capaciteit);

        if ($success) {
            $message = "Tafel toegevoegd!";
        } else {
            $message = "Er is een fout opgetreden bij het toevoegen van de tafel.";
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
    <title>Add Tafel</title>
</head>
<body>
    <h1>Add Tafel</h1>
    <?php if (!empty($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="add-tafel.php" method="POST">
        <label for="naam">Naam:</label>
        <input type="text" id="naam" name="naam">
        <label for="nummer">Nummer:</label>
        <input type="text" id="nummer" name="nummer">
        <label for="capaciteit">Capaciteit:</label>
        <input type="text" id="capaciteit" name="capaciteit">
        <button type="submit">Voeg Tafel Toe</button>
    </form>
</body>
</html>
