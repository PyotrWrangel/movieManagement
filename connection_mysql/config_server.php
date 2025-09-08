<?php

$host = "127.0.0.1";
$user = "root";
$password = "";


$connessione = new mysqli($host, $user, $password);

if($connessione->connect_error) {
    die("Errore durante la connessione" . $connessione->connect_error);
}