<?php
//kode 9 digit
$koneksi = new mysqli("localhost", "root", "", "perpustakaan");
$carikode = mysqli_query($koneksi, "SELECT id_anggota FROM tb_anggota ORDER BY id_anggota DESC");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['id_anggota'];
$urut = substr($kode, 1, 3);
$tambah = (int)$urut + 1;

if (strlen($tambah) == 1) {
  $format = "A" . "00" . $tambah;
} else if (strlen($tambah) == 2) {
  $format = "A" . "0" . $tambah;
} else if (strlen($tambah) == 3) {
  $format = "A" . $tambah;
} else {
  $format = "sss"; // Fallback untuk ID baru jika belum ada ID di database
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="app/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="app/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="app/plugins/sweetalert2/sweetalert2.min.css">
  <script src="app/plugins/sweetalert2/sweetalert2.min.js"></script>
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Form Register</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nama Pengguna" name="nama_pengguna" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <select name="jekel" id="jekel" class="form-control" required>
              <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-venus-mars"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Kelas" name="kelas" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-landmark"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="number" class="form-control" placeholder="Nomor Hp" name="no_hp" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <select name="level" id="level" class="form-control">
              <option>User</option>
            </select>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" name="Simpan" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <a href="login.php" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="app/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="app/dist/js/adminlte.min.js"></script>
  <script src="app/plugins/sweetalert2/sweetalert2.min.js"></script>
</body>

</html>
<?php
$koneksi = new mysqli("localhost", "root", "", "perpustakaan");

if (isset($_POST['Simpan'])) {
  // Mulai proses simpan data ke tb_pengguna
  $sql_simpan_pengguna = "INSERT INTO tb_pengguna (nama_pengguna, username, password, level) VALUES (
        '" . $_POST['nama_pengguna'] . "',
        '" . $_POST['username'] . "',
        '" . md5($_POST['password']) . "',
        '" . $_POST['level'] . "')";

  $query_simpan_pengguna = mysqli_query($koneksi, $sql_simpan_pengguna);

  // Jika penyimpanan ke tb_pengguna berhasil, lanjutkan ke tb_anggota
  if ($query_simpan_pengguna) {
    // Dapatkan ID pengguna terakhir yang disimpan
    $pengguna_id = mysqli_insert_id($koneksi);

    // Simpan data ke tb_anggota
    $sql_simpan_anggota = "INSERT INTO tb_anggota (id_anggota, id_pengguna, nama, jekel, kelas, no_hp) VALUES (
            '" . $format . "',  /* Menggunakan format ID yang sudah dibuat */
            '" . $pengguna_id . "',
            '" . $_POST['nama_pengguna'] . "',
            '" . $_POST['jekel'] . "',
            '" . $_POST['kelas'] . "',
            '" . $_POST['no_hp'] . "')";

    $query_simpan_anggota = mysqli_query($koneksi, $sql_simpan_anggota);

    // Cek apakah data berhasil disimpan ke tb_anggota
    if ($query_simpan_anggota) {
      echo "<script>
            Swal.fire({title: 'Tambah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
            }).then((result) => {if (result.value) {
                window.location = 'index.php?page=MyApp/data_pengguna';
                }
            })</script>";
    } else {
      echo "<script>
            Swal.fire({title: 'Tambah Data ke tb_anggota Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
            }).then((result) => {if (result.value) {
                window.location = 'index.php?page=MyApp/add_pengguna';
                }
            })</script>";
    }
  } else {
    echo "<script>
        Swal.fire({title: 'Tambah Data ke tb_pengguna Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {
            window.location = 'index.php?page=MyApp/add_pengguna';
            }
        })</script>";
  }
}
?>