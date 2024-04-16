<?php
// Iekļauj datubāzes savienojuma skriptu
require_once 'db_connection.php';

// Pārbauda, vai id ir padots kā GET parametrs
if(isset($_GET['id'])) {
    $fruit_id = $_GET['id'];
    
    // Izveido vaicājumu, lai iegūtu informāciju par konkrēto augli
    $sql = "SELECT * FROM fruits WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $fruit_id);
    $stmt->execute();
    
    // Pārbauda, vai ir atrasts auglis ar norādīto id
    if($stmt->rowCount() > 0) {
        $fruit = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Book not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>View Books</h1>
    <div>
        <h2><?php echo $fruit['name']; ?></h2>
        <p>Calories: <?php echo $fruit['calories']; ?></p>
    </div>
</body>
</html>
