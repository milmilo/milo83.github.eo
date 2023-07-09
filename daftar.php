<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>SISTEM REGISTRASI PENDUDUK</title>
    <meta name="author" content="EMIL LAHM" />
    <link rel="shortcut icon" type="image/x-icon" href="images/luwu.png" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link href="css/my.css" rel="stylesheet">
</head>

<body>
    <div class="salwa">
        <div class="left-column">
            <img src="images/luwu.png" alt="Gambar">
            <h1>S . R . P</h1>
            <p>SISTEM REGISTRASI PENDUDUK</p>
            <h4>Versi 1.0</h4>
        </div>

        <div class="vertical-line"></div>

        <div class="container">
            <div class="right-column">
                <h3 style="text-align: center;color: white;margin-bottom: 15px;">FORM PENDAFTARAN</h3>

                <form method="POST" action="daftar.php">
                    <label for="nik"></label>
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required><br>

                    <label for="username"></label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required><br>

                    <label for="nama"></label>
                    <input type="text" id="nama" name="nama" placeholder="Nama" required><br>

                    <label for="email"></label>
                    <input type="email" id="email" name="email" placeholder="Email" required><br>

                    <label for="alamat"></label>
                    <input type="text" id="alamat" name="alamat" placeholder="Alamat" required><br>

                    <label for="password"></label>
                    <input type="password" id="password" name="password" placeholder="Password" required><br>

                    <label for="no_hp"></label>
                    <input type="text" id="no_hp" name="no_hp" placeholder="No. HP" required><br>

                    <button type="submit">DAFTAR</button>

                </form>
            </div>
        </div>
    </div>

    <footer>
        <div class="fixed-footer text-center bg-dark">
            <small class="text-secondary">&copy;
                <script>
                    document.write(new Date().getFullYear())
                </script> ❤️ EMIL LAHM
            </small>
        </div>
    </footer>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Menghubungkan ke database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tugas_uas";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Koneksi database gagal: " . $conn->connect_error);
        }

        // Mengambil data dari form
        $nik = $_POST['nik'];
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $password = $_POST['password'];
        $no_hp = $_POST['no_hp'];

        // Menyimpan data ke dalam tabel dt_regis
        $sql = "INSERT INTO dt_regis (nik, username, nama, email, alamat, password, no_hp, st_regis)
            VALUES ('$nik', '$username', '$nama', '$email', '$alamat', '$password', '$no_hp', 1)";

        if ($conn->query($sql) === TRUE) {
            // Menampilkan pesan SweetAlert dan redirect ke halaman index.html
            echo "<script>
              swal('Pendaftaran Anda', 'Telah berhail!', 'success').then(function() {
                window.location = 'index.html';
              });
            </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>

</body>

</html>