<?php
// db_connection.php

$db_host = 'localhost';
$db_name = 'biblioteka';
$db_user = 'root';
$db_pass = 'root';

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit(); // Beidz skriptu, ja neizdevās savienoties ar datubāzi
}
?>
