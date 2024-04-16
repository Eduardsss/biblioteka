<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruits</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Fruits</h1>
    <a href="add_fruit.php">Pievieno augli</a>
    <br><br>

    <?php
    //pievieno datubāzi
    require_once 'db_connection.php';
    require_once 'filter_fruits.php';
    // savāc visus augļus no datubāzes
    $sql = "SELECT * FROM fruits";
    $result = $db->query($sql);

    // pārbauda vai augļi eksistē
    if ($result->rowCount() > 0) {
        // parāda augļus
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<div>";
            echo "<h2>" . $row['name'] . "</h2>";
            echo "<p>Calories: " . $row['calories'] . "</p>";
            echo "<a href='view_fruit.php?id=" . $row['id'] . "'>View</a> ";
            echo "<a href='edit_fruit.php?id=" . $row['id'] . "'>Edit</a> ";
            echo "<a href='delete_fruit.php?id=" . $row['id'] . "'>Delete</a>";
            echo "</div>";
        }
    } else {
        echo "Nav augļi.";
    }
    ?>
</body>
</html>
