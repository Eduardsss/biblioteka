<?php
//datubāzes savienojums
require_once 'db_connection.php';

// Pārbauda vai id ir padots kā GET
if(isset($_GET['id'])) {
    $fruit_id = $_GET['id'];
    
    //lai dzēstu konkrēto augli pēc id
    $sql = "DELETE FROM fruits WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $fruit_id);
    
    // Izpilda vaicājumu
    if($stmt->execute()) {
        // Pāriet uz galveno lapu ja dzēšana bija veiksmīga
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting book.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>
