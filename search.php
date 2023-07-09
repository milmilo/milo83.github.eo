<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tugas_uas";

// Membuat koneksi
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

// Mendapatkan NIK dari parameter GET
$nik = $_GET["nik"];

// Membuat query SQL
$sql = "SELECT * FROM dt_regis WHERE nik = '$nik'";

// Menjalankan query dan mendapatkan hasil
$result = $koneksi->query($sql);

// Membuat array untuk menyimpan hasil pencarian
$searchResults = array();

// Memeriksa apakah ada hasil pencarian
if ($result->num_rows > 0) {
  // Menyimpan setiap baris hasil pencarian ke dalam array
  while ($row = $result->fetch_assoc()) {
    $searchResults[] = $row;
  }
}

// Mengirim hasil pencarian dalam format JSON
echo json_encode($searchResults);

// Menutup koneksi
$koneksi->close();
