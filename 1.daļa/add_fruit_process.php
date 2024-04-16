<?php
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Valideito input
    $name = htmlspecialchars($_POST['name']);
    $calories = intval($_POST['calories']);

    //Ievieto datubāzē
    $sql = "INSERT INTO fruits (name, calories) VALUES (:name, :calories)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':calories', $calories);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: Unable to add fruit.";
    }
}
?>
