<?php
// pievienu datubāzi
require_once 'db_connection.php';

// Pārbauda vai id ir padots kā GET parametrs
if(isset($_GET['id'])) {
    $fruit_id = $_GET['id'];
    
    // Izveido vaicājumu lai iegūtu informāciju par augli
    $sql = "SELECT * FROM fruits WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $fruit_id);
    $stmt->execute();
    
    // Pārbauda vai atrasts auglis ar norādīto id
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
    <title>Edit Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Book</h1>
    <form action="edit_fruit_process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $fruit['id']; ?>">
        
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $fruit['name']; ?>" required><br><br>

        <label for="calories">Cik ir pieejamas:</label><br>
        <input type="number" id="calories" name="calories" value="<?php echo $fruit['calories']; ?>" required><br><br>

        <input type="submit" value="Save Changes">
    </form>
</body>
</html>
