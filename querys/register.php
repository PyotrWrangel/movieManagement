<?php

require_once '../connection_mysql/config.php';

$username = $connessione->real_escape_string($_POST['userName']);
$email = $connessione->real_escape_string($_POST['email']);
$password = $connessione->real_escape_string($_POST['password_hash']);

//criptazione password
$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $connessione->prepare("INSERT INTO userregister(userName, email, password_hash) VALUES (?, ?, ?)");
$stmt->bind_param('sss', $username, $email, $hash);

//usiamo try catch per le eccezioni
try {
if ($stmt ->execute()) {
    $data = [
        "messaggio" => "Utente registrato con successo",
        "response" => 1
    ];

    echo json_encode($data);
    
}
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() === 1062) {
           $data = [
        "messaggio" => "email gia registrata",
        "response"=> 0
    ];
    echo json_encode($data);
} else {
    $data = [
        "messaggio" => "Errore nel DB: " . $e->getMessage(),
        "response" => 2
    ];
}
}