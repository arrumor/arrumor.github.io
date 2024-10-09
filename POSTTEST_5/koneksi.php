<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $db_name = "db_restoran";

    $conn = mysqli_connect($server, $user, $password, $db_name);

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
?>