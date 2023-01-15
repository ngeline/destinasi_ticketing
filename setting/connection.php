<?php
    $host = "localhost";
    $username = "roothost";
    $password = "1234567890";
    $database = "ticketing_app";
    $port = 3306;
    $urlPort = 88;

    $connection = mysqli_connect($host, $username, $password, $database, $port);

    $base_url = "http://localhost:".$urlPort."/destinasi_ticketing";
?>