<?php
    $host = "localhost";
    $username = "roothost";
    $password = "1234567890";
    $database = "ticketing_app";
    $port = 8888;

    $connection = mysqli_connect($host, $username, $password, $database, $port);

    $base_url = `http://localhost:${$port}/ticketing_app`;
?>