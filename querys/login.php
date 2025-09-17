<?php

require_once '../connection_mysql/config.php';


//facciamo partire la sessione
session_start();

error_log('test');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //preparo la query
    $stmt = $connessione->prepare("SELECT id, userName, password_hash FROM userRegister WHERE email=?");
    //collego i parametri di input
    $stmt->bind_param('s', $email);
    //esecuzione
    $stmt->execute();
    //collego i parametri di output, quelli che la query restituisce
    //l'id del utente nel db sara collegato all'id della sessione
    $stmt->bind_result($id, $username, $hash);
    //recupero la riga
    $stmt->fetch();
    $_SESSION['id'] = $id;

        //verifica della password
        if (password_verify($password, $hash)) {
            session_regenerate_id();  
            $_SESSION['session_user'] = $email;
            $_SESSION['userName'] = $username;

            $data = [
                "messaggio" => 'Utente loggato',
                "response" => 1
            ];
            echo json_encode($data);

            //credenziali errate
        } else {
            $data = [
                "messaggio" => 'Credenziali errate',
                "response" => 0
            ];
            echo json_encode($data);
        }
        error_log("SESSION dopo login: " . print_r($_SESSION, true));
}