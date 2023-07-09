<?php
// Include file koneksi ke database
include "tugas_uas/koneksi.php";

// Mengecek apakah tombol "DAFTAR" telah ditekan
if (isset($_POST["submit"])) {
    // Mendapatkan nilai dari input form pendaftaran
    $username = $_POST["username"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $alamat = $_POST["alamat"];
    $password = md5($_POST["password"]); // untuk password digunakan enskripsi md5
    $no_hp = $_POST["no_hp"];

    // Query untuk menyimpan data ke tabel dt_regis
    $sql = "INSERT INTO dt_regis (username, nama, email, alamat, password, no_hp) VALUES ('$username', '$nama', '$email', '$alamat', '$password', '$no_hp')";

    // Menjalankan query
    $result = mysqli_query($kon, $sql);

    if ($result) {
        // Jika data berhasil disimpan, tampilkan pesan sukses dan redirect ke halaman registrasi.php
        echo "<script>
                alert('Pendaftaran Anda berhasil');
                window.location.href = 'registrasi.php';
              </script>";
        exit;
    } else {
        // Jika terjadi error saat menyimpan data, tampilkan pesan error
        echo "Error: " . mysqli_error($kon);
    }
}
