<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Fruit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Add Fruit</h1>
    <form action="add_fruit_process.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="calories">Calories:</label><br>
        <input type="number" id="calories" name="calories" required><br><br>

        <input type="submit" value="Add Fruit">
    </form>
</body>
</html>
