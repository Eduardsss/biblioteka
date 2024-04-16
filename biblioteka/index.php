<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiešsaistes bibliotēka</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Tiešsaistes bibliotēka</h1>
    </header>
    <div class="catalog">
        <h2>Grāmatu katalogs</h2>
        <div id="book-list">
            <?php
            // Savienojamies ar datubāzi
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "biblioteka";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Pārbaudam savienojuma veiksmīgumu
            if ($conn->connect_error) {
                die("Savienojums ar datubāzi neizdevās: " . $conn->connect_error);
            }

            // Izveidojam vaicājumu, lai iegūtu visas grāmatas
            $sql = "SELECT * FROM books";
            $result = $conn->query($sql);

            // Parādam grāmatas, ja tādas ir
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='book'>";
                    echo "<h3>" . $row["title"] . "</h3>";
                    echo "<p><strong>Autors:</strong> " . $row["author"] . "</p>";
                    echo "<p><strong>Izdošanas gads:</strong> " . $row["year"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "Datubāzē nav pievienotas nevienas grāmatas.";
            }
            // Aizveram savienojumu
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
