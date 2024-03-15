<?php
include('rekening.php');
require_once('../header.php');

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['totaal_bedrag']) && isset($_POST['betaald'])) {
        $totaal_bedrag = $_POST['totaal_bedrag'];
        $betaald = $_POST['betaald'];

        $rekening = new Rekening($myDb);

        $success = $rekening->insertRekening($totaal_bedrag, $betaald);

        if ($success) {
            $message = "Rekening toegevoegd!";
        } else {
            $message = "Er is een fout opgetreden bij het toevoegen van de rekening.";
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
    <title>Add Rekening</title>
</head>
<body>
    <h1>Add Rekening</h1>
    <?php if (!empty($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="add-rekening.php" method="POST">
        <label for="totaal_bedrag">Totaal Bedrag:</label>
        <input type="text" id="totaal_bedrag" name="totaal_bedrag">
        <label for="betaald">Betaald:</label>
        <input type="text" id="betaald" name="betaald">
        <button type="submit">Voeg Rekening Toe</button>
    </form>
</body>
</html>
