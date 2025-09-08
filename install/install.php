<?php

require_once("../connection_mysql/config_server.php");



//se tutto è installato porta direttamente alla home

//controlliamo che il file esista all interno della cartella
//se esiste il db e le tabelle sono gia state create
if(file_exists(__DIR__ . "/../installed.lock")) {
    //spostati nella homepage
    header("Location: .././index.php");
    exit;
}

//connessione al server mysql

if(!$connessione->query("CREATE DATABASE IF NOT EXISTS filmissimi")) {
    die("Errore durante la creazione del database: " . $connessione->error);
}

//selezione database

$connessione->select_db('filmissimi');

//creazione tabelle

$tables = <<<SQL
CREATE TABLE IF NOT EXISTS userRegister (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(255),
cognome VARCHAR(255),
eta INT,
sesso VARCHAR(30),
data_nascita date,
genere_preferito VARCHAR(255),
userName VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
password_hash VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titolo VARCHAR(255) NOT NULL,
    autore VARCHAR(255) NOT NULL,
    anno_pubblicazione INT NOT NULL,
    genere VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
SQL;


if(!$connessione->multi_query($tables)) {
    die("Errore durante la creazione delle tabelle " . $connessione->error);
}
//esegui il comando finche non esegui tutte le query
while ($connessione->more_results() && $connessione->next_result()) {}

//creo il file lock

file_put_contents(__DIR__ . "/installed.lock", date('c') . " Installed");

//vai alla homepage
header("Location: /index.php");
exit;





