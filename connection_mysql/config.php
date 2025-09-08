<?php

$host = '127.0.0.1';
$user = 'root';
$password = "";
$database = "filmissimi";

$connessione = new mysqli($host, $user, $password, $database);

if($connessione->connect_error) {
    die("Errore durante la connessione al database: " . $connessione->connect_error);
}