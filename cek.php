<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>SISTEM REGISTRASI PENDUDUK</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="EMIL LAHM">
  <link rel="shortcut icon" type="image/x-icon" href="images/luwu.png" />
  <link href="css/giu.css" rel="stylesheet">

</head>

<body>
  <header>
    <nav class="navbar">
      <div class="logo">
        <img src="images/luwu.png" alt="Logo">
        <span class="logo-name">DINAS DUKCAPIL KAB. LUWU
          <h6>KANTOR MALL PELAYANAN PUBLIK WALMAS</h6>
        </span>
      </div>
      <ul class="menu">
        <li><a href="./">Home</a></li>
        <li><a href="download.html">Download</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
    </nav>
  </header>

  <section class="giu">
    <div class="page-title">
      <div class="row">
        <div class="col-md-12">
          <h2>CEK STATUS PENDAFTARAN ANDA DISINI</h2>
          <p>====================================================</p>
        </div>
      </div>
    </div>

    <div class="cards-section">
      <div class="card-giu">
        <h3>Masukkan NIK anda disini</h3>
        <form action="search.php" method="GET" id="searchForm">
          <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK..." required>
          <button type="submit">Search</button>
        </form>
      </div>
    </div>
  </section>

  <div id="myModal" class="modal">
    <div class="modal-content">
      <!-- <span class="close">&times;</span>
      <h3>Hasil Pencarian</h3> -->
      <div id="searchResults"></div>
      <button class="modal-btn"><a href="./">Kembali</a></button>
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

  <script src="js/script.js"></script>
  <script>
    // Ambil elemen-elemen yang diperlukan
    var searchForm = document.getElementById('searchForm');
    var modal = document.getElementById('myModal');
    var searchResultsContainer = document.getElementById('searchResults');

    // Fungsi untuk menampilkan modal
    function showModal() {
      modal.style.display = 'block';
    }

    // Fungsi untuk menutup modal
    function closeModal() {
      modal.style.display = 'none';
    }

    // Tambahkan event listener ke form pencarian
    searchForm.addEventListener('submit', function(e) {
      e.preventDefault(); // Mencegah pengiriman form
      var nik = searchForm.nik.value;
      performSearch(nik);
    });

    // Fungsi untuk melakukan pencarian
    function performSearch(nik) {
      // Lakukan proses pencarian sesuai dengan kebutuhan Anda
      // Misalnya, mengirim permintaan AJAX ke server dan menerima respons dengan hasil pencarian
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var results = JSON.parse(this.responseText);
          showSearchResults(results);
        }
      };
      xmlhttp.open("GET", "search.php?nik=" + nik, true);
      xmlhttp.send();
    }

    // Fungsi untuk menampilkan hasil pencarian
    function showSearchResults(results) {
      // Membuat tampilan card untuk setiap hasil pencarian
      var searchResults = '';
      for (var i = 0; i < results.length; i++) {
        var result = results[i];
        var statusPendaftaran = (result.st_regis === '1') ? 'Sukses' : 'Gagal';
        searchResults += '<div class="card-asus">' +
          '<h3>' + 'Hasil Pencarian' + '</h3>' +
          '<p>NIK : ' + result.nik + '</p>' +
          '<p>Nama : ' + result.nama + '</p>' +
          '<p>Email : ' + result.email + '</p>' +
          '<p>Alamat : ' + result.alamat + '</p>' +
          '<p>No. HP : ' + result.no_hp + '</p>' +
          '<p>Status Pendaftaran : ' + statusPendaftaran + '</p>' +
          '</div>';
      }
      // Menampilkan hasil pencarian di dalam elemen searchResultsContainer
      searchResultsContainer.innerHTML = searchResults;
      showModal();
    }

    // Tambahkan event listener ke tombol tutup pada modal
    var closeModalBtn = document.querySelector('.close');
    closeModalBtn.addEventListener('click', closeModal);
  </script>
</body>

</html>