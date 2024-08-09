
<?php
// Kode 9 digit
$koneksi = new mysqli ("localhost","root","","perpustakaan");

// Mendapatkan ID pengguna yang sedang login
$id_pengguna = $_SESSION['ses_id'];

// Ambil data ID terakhir dari tb_sirkulasi
$carikode = mysqli_query($koneksi, "SELECT id_sk FROM tb_sirkulasi ORDER BY id_sk DESC");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['id_sk'];
$urut = substr($kode, 1, 3);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1){
    $format = "S00".$tambah;
} else if (strlen($tambah) == 2){
    $format = "S0".$tambah;
} else if (strlen($tambah) == 3){
    $format = "S".$tambah;
} else {
    $format = "S".$tambah;
}

// Ambil data anggota yang sedang login
$query_anggota = "SELECT * FROM tb_anggota WHERE id_pengguna = '$id_pengguna'";
$result_anggota = mysqli_query($koneksi, $query_anggota);
$anggota = mysqli_fetch_array($result_anggota);
?>

<section class="content-header">
    <h1>
        Sirkulasi
        <small>Buku</small>
    </h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="card">
              <div class="card-header">
                    <h3 class="card-title">Tambah Peminjaman</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Id Sirkulasi</label>
                            <input type="text" name="id_sk" id="id_sk" class="form-control" value="<?php echo $format; ?>" readonly />
                        </div>

                        <div class="form-group">
                            <label>Nama Peminjam</label>
                            <input type="text" name="nama_peminjam" id="nama_peminjam" class="form-control" value="<?php echo $anggota['nama']; ?>" readonly />
                            <input type="hidden" name="id_anggota" value="<?php echo $anggota['id_anggota']; ?>" />
                        </div>

                        <div class="form-group">
                            <label>Buku</label>
                            <select name="id_buku" id="id_buku" class="form-control select2" style="width: 100%;">
                                <option selected="selected">-- Pilih --</option>
                                <?php
                                // Ambil data dari database
                                $query = "SELECT * FROM tb_buku";
                                $hasil = mysqli_query($koneksi, $query);
                                while ($row = mysqli_fetch_array($hasil)) {
                                ?>
                                    <option value="<?php echo $row['id_buku'] ?>">
                                        <?php echo $row['id_buku'] ?> - <?php echo $row['judul_buku'] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tgl Pinjam</label>
                            <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" />
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="card-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=data_sirkul" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
            <!-- /.box -->
</section>

<?php

if (isset($_POST['Simpan'])){

    // Menangkap post tgl pinjam
    $tgl_p = $_POST['tgl_pinjam'];
    // Membuat tgl kembali
    $tgl_k = date('Y-m-d', strtotime('+7 days', strtotime($tgl_p)));
    
    $sql_simpan = "INSERT INTO `tb_sirkulasi` (`id_sk`, `id_buku`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES (
        '".$_POST['id_sk']."',
        '".$_POST['id_buku']."',
        '".$_POST['id_anggota']."',
        '".$tgl_p."',
        '".$tgl_k."',
        'PIN'
    );";
    
    $sql_simpan .= "INSERT INTO log_pinjam (id_buku, id_anggota, tgl_pinjam) VALUES (
        '".$_POST['id_buku']."',
        '".$_POST['id_anggota']."',
        '".$tgl_p."'
    );";   

    $query_simpan = mysqli_multi_query($koneksi, $sql_simpan);

    if ($query_simpan) {
        echo "<script>
        Swal.fire({
            title: 'Tambah Data Berhasil',
            text: '',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data_sirkul';
            }
        });
        </script>";
    } else {
        echo "<script>
        Swal.fire({
            title: 'Tambah Data Gagal',
            text: '',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=add_sirkul';
            }
        });
        </script>";
    }
}
    