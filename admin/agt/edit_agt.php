<?php
$koneksi = new mysqli ("localhost","root","","perpustakaan");
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_anggota WHERE id_anggota='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<section class="content-header">
	<h1>
		Master Data
		<small>Data Anggota</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Ubah Anggota</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id_pengguna" value="<?php echo $data_cek['id_pengguna'] ?>">
					<div class="card-body">

						<div class="form-group">
							<label>Id anggota</label>
							<input type='text' class="form-control" name="id_anggota" value="<?php echo $data_cek['id_anggota']; ?>" readonly />
						</div>

						<div class="form-group">
							<label>Nama</label>
							<input type='text' class="form-control" name="nama" value="<?php echo $data_cek['nama']; ?>" />
						</div>

						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select name="jekel" id="jekel" class="form-control" required>
								<option value="">-- Pilih --</option>
								<?php
								//cek data yg dipilih sebelumnya
								if ($data_cek['jekel'] == "Laki-laki") echo "<option value='Laki-laki' selected>Laki-laki</option>";
								else echo "<option value='Laki-laki'>Laki-laki</option>";

								if ($data_cek['jekel'] == "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
								else echo "<option value='Perempuan'>Perempuan</option>";
								?>
							</select>
						</div>

						<div class="form-group">
							<label>Kelas</label>
							<input type='text' class="form-control" name="kelas" value="<?php echo $data_cek['kelas']; ?>" />
						</div>

						<div class="form-group">
							<label>No HP</label>
							<input type='number' class="form-control" name="no_hp" value="<?php echo $data_cek['no_hp']; ?>" />
						</div>

					</div>
					<!-- /.box-body -->

					<div class="card-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_agt" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset($_POST['Ubah'])) {
	// Mulai proses ubah
	$nama = $_POST['nama'];
	$id_anggota = $_POST['id_anggota'];
	$id_pengguna = $_POST['id_pengguna'];

	// Update tabel tb_anggota
	$sql_ubah_anggota = "UPDATE tb_anggota SET
        nama='$nama',
        jekel='" . $_POST['jekel'] . "',
        kelas='" . $_POST['kelas'] . "',
        no_hp='" . $_POST['no_hp'] . "'
        WHERE id_anggota='$id_anggota'";
	$query_ubah_anggota = mysqli_query($koneksi, $sql_ubah_anggota);

	// Update tabel tb_pengguna
	$sql_ubah_pengguna = "UPDATE tb_pengguna SET
        nama_pengguna='$nama'
        WHERE id_pengguna='$id_pengguna'";
	$query_ubah_pengguna = mysqli_query($koneksi, $sql_ubah_pengguna);

	if ($query_ubah_anggota && $query_ubah_pengguna) {
		echo "<script>
        Swal.fire({
            title: 'Ubah Data Berhasil',
            text: '',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_agt';
            }
        })</script>";
	} else {
		echo "<script>
        Swal.fire({
            title: 'Ubah Data Gagal',
            text: '',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_agt';
            }
        })</script>";
	}
}
?>