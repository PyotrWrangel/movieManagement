<?php

session_start();
error_log("SESSION in dashboard" . print_r($_SESSION, true));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Benvenuto</p>
    <h1><?php echo $_SESSION['userName'] ?></h1>
    <button id="logoutButton">Logout</button>

<script src="checklogged.js"></script>
</body>
</html>
