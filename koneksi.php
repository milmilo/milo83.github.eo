<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "pendaftaran";

$kon = mysqli_connect($host, $user, $password, $db);

// Check connection
if (mysqli_connect_errno()) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
