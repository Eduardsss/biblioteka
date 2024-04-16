<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gramatu filtrs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Filtrē gramatas</h1>
        <form action="filter_fruits.php" method="GET">
            <label for="calories">Ievadi cik gramatas tev vajag:</label><br>
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
                echo "<h2>Gramatas $filter_calories kalorijām:</h2>";
                echo "<ul>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<li>" . $row['name'] . " - " . $row['calories'] . " tik daudz</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Nav atrastas gramatas kuras ir mazāk par $filter_calories .</p>";
            }
        } else if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["filter"])) {
            echo "<p>Ievadi pareizu skaitli luni.</p>";
        }
        ?>
    </div>
    <a href="http://localhost/1.da%c4%bca/index.php" class="button">Velcies atpakaļ</a>
</body>
</html>
