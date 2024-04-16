<?php
// savieno ar manu mīļo datubāzi
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pārbauda vai visi lauki ir saņemti
    if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["calories"])) {
        $id = htmlspecialchars($_POST["id"]);
        $name = htmlspecialchars($_POST["name"]);
        $calories = intval($_POST["calories"]);

        // vaicājums lai atjaunotu datus datubāzē
        $sql = "UPDATE fruits SET name = :name, calories = :calories WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':calories', $calories);
        $stmt->bindParam(':id', $id);


        if ($stmt->execute()) {
            // Pāreja uz galveno lapu
            header("Location: index.php");
            exit();
        } else {
            // Ja radās kļūda, izvada kļūdas ziņojumu
            echo "Losi kautkas nav pareizi.";
            exit();
        }
    } else {
        // Ja nepieciešamie lauki nav saņemti no formas, izvada kļūdas ziņojumu
        echo "Nemāki rakstīt?.";
        exit();
    }
} else {
    // Ja forma netika iesniegta izmantojot POST metodi, izvada kļūdas ziņojumu
    echo "Nederīgs vaicājums suni.";
    exit();
}
?>
