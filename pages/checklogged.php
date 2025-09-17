<?php
session_start();
//controllo la sessione per vedere se è loggatoù
// require_once 'login.php';

if(!isset($_SESSION['id'])) {
    echo json_encode(["messaggio" => "Non sei loggato", "response" => 0]);
} else {
    echo json_encode([
        "messaggio" => "Ok",
        "response" => 1
    ]);
}