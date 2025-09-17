<?php

session_start();
error_log("SESSION in dashboard" . print_r($_SESSION, true));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Document</title>
</head>

<body>
    <header class="first-header">
        <div class="header-button">
            <button class="logoutButton" id="logoutButton">Logout</button>
        </div>
        <div class="username">
            <p class="header-p">Benvenuto
            <h1 class="header-title"><?php echo $_SESSION['userName'] ?></h1>
            </p>
        </div>
    </header>


    <script src="checklogged.js"></script>
</body>

</html>