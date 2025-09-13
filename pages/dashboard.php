<?php
session_start();
//controllo la sessione per vedere se è loggato

if(!isset($_SESSION['id'])) {
    echo json_encode(["messaggio" => "Non sei loggato", "response" => 0]);
    exit;
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
    <?php

    
    echo "ciao " . $_SESSION['userName'];
    ?>
    <p>AMLA AMLA</p>

    
</body>
</html>