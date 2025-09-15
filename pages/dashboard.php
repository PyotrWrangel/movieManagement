<?php
session_start();
//controllo la sessione per vedere se è loggato

if(!isset($_SESSION['id'])) {
    echo json_encode(["messaggio" => "Non sei loggato", "response" => 0]);
    exit;
} else {
    echo json_encode([
        "messaggio" => "Benvenuto" . $_SESSION['userName'],
        "response" => 1

    ]);
}
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>AMLA AMLA</p>
    <button id="logoutButton">Logout</button>

<script src="../script.js"></script>
</body>
</html>
