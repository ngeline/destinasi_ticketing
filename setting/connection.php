<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "ticketing_app";
    $port = 3306;
    $urlPort = 80;

    $connection = mysqli_connect($host, $username, $password, $database, $port);

    $base_url = "http://localhost:".$urlPort."/destinasi_ticketing";
?>