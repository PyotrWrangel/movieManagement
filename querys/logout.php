<?php

session_start();

session_unset(); //rimuove i dati dalla sessione

session_regenerate_id(true);

$data = [
    "messaggio" => "utente sloggato",
    "response" => 1
];
echo json_encode($data);