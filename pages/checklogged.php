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