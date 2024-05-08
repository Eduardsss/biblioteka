<?php
session_start();
require_once 'db_connection.php';

// Pārbaude, vai lietotājs ir autorizējies
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Pārbauda, vai ir saņemts grāmatas ID no pieprasījuma parametriem
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Izveidojiet vaicājumu, lai dzēstu grāmatu no datubāzes
    $sql = "DELETE FROM books WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        // Pāreja uz grāmatu saraksta lapu pēc veiksmīgas dzēšanas
        header("Location: books.php");
        exit();
    } else {
        echo "Error deleting book.";
    }
} else {
    echo "Invalid request.";
}
?>
