<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pievieno gramatu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Pievieno gramatu</h1>
    <form action="add_fruit_process.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="calories">Cik ir pieejamas:</label><br>
        <input type="number" id="calories" name="calories" required><br><br>

        <input type="submit" value="Add Fruit">
    </form>
</body>
</html>
