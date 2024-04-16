<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Augļu filtrs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Filtrē augļus</h1>
        <form action="filter_fruits.php" method="GET">
            <label for="calories">Ievadi maximālo kaloriju skaitu fatass:</label><br>
            <input type="number" id="calories" name="filter" required><br><br>
            <input type="submit" value="Filter">
        </form>

        <?php
        // Iekļauj datubāzes savienojuma skriptu
        require_once 'db_connection.php';

        // Pārbauda, vai ir saņemti dati no formas
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["filter"]) && is_numeric($_GET["filter"])) {
            // Iegūst kaloriju filtru no formas
            $filter_calories = intval($_GET["filter"]);

            // Izveido SQL vaicājumu, lai atlasītu augļus, kuru kaloriju skaits ir zem norādītā skaita
            $sql = "SELECT * FROM fruits WHERE calories < :calories";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':calories', $filter_calories);
            $stmt->execute();

            // Parāda rezultātus, ja ir atrasti augļi
            if ($stmt->rowCount() > 0) {
                echo "<h2>Augļi zem $filter_calories kalorijām:</h2>";
                echo "<ul>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<li>" . $row['name'] . " - " . $row['calories'] . " calories</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Nav atrasti augļi ar mazāk par $filter_calories kalorijām.</p>";
            }
        } else if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["filter"])) {
            echo "<p>Ievadi pareizu skaitli luni.</p>";
        }
        ?>
    </div>
    <a href="http://localhost/1.da%c4%bca/index.php" class="button">Velcies atpakaļ</a>
</body>
</html>
