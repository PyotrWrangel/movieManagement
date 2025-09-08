<?php

//se il file non esiste vai su install

if(!file_exists(__DIR__ . "/install/installed.lock")) {
    header("Location: install/install.php");
    exit;
}

require_once "./connection_mysql/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h1>Benbenuto in FILMISSIMI</h1>
        <button class="button"> Accedi </button>
        <h2>oppure</h2>
        <button class="button"> Registrati </button>
    <h2> per utilizzare il servizio</h2>

    </div>
</body>
</html>