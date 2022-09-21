<?php
    $server = "127.0.0.1";
    $username = "MRROOT";
    $password = "ROOT9791@@";

    try {
        $bigec = new PDO("mysql:host=$server;dbname=bigec;charset=utf8", $username, $password);
        $bigec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
    echo "Connexion echoué: " . $e->getMessage();
    }
?>