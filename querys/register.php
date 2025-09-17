<?php

require_once '../connection_mysql/config.php';

$username = $connessione->real_escape_string($_POST['userName']);
$email = $connessione->real_escape_string($_POST['email']);
$password = $connessione->real_escape_string($_POST['password_hash']);

//criptazione password
$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $connessione->prepare("INSERT INTO userregister(userName, email, password_hash) VALUES (?, ?, ?)");
$stmt->bind_param('sss', $username, $email, $hash);

if ($stmt ->execute()) {
    $data = [
        "messaggio" => "Utente registrato con successo",
        "response" => 1
    ];

    echo json_encode($data);
}  else {
     if ($connessione->errno === 1062) {   //errore che indica valore di entrata duplicato
    $data = [
        "messaggio" => "email gia registrata",
        "response"=> 0
    ];
    echo json_encode($data);
} else {
    $data = [
        "messaggio" => "errore interno",
        "response" => 2
    ];
        echo json_encode($data);
}
}