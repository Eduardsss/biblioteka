<?php

$dsn = 'mysql:host=localhost;dbname=fruits';
$username = 'root'; 
$password = ''; 

try {
    // Izveido datubāzes savienojumu
    $db = new PDO($dsn, $username, $password);
    // Uzstāda PDO kļūdu režīmu uz izņēmumu
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Ja rodas kļūda izvada kļūdas ziņojumu
    echo 'Tu esi losis: ' . $e->getMessage();
    exit();
}
?>
