<?php

session_start();

$_SESSION = array(); //lo rendiamo un array vuoto per togliere tutte le info che sono state salvate

session_destroy();

$data = [
    "messaggio" => "utente sloggato",
    "response" => 1
];
echo json_encode($data);