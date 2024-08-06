<section class="content-header">
	<h1>
		Pengguna Sistem
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="card">
				<div class="card-header with-border">
					<h3 class="card-title">Tambah Pengguna</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="card-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Pengguna</label>
							<input type="text" name="nama_pengguna" id="nama_pengguna" class="form-control" placeholder="Nama pengguna">
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Username</label>
							<input type="text" name="username" id="username" class="form-control" placeholder="Username">
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="Password">
						</div>

						<div class="form-group">
							<label>Level</label>
							<select name="level" id="level" class="form-control">
								<option>-- Pilih Level --</option>
								<option>Administrator</option>
								<option>Petugas</option>
							</select>
						</div>

					</div>
					<!-- /.card-body -->

					<div class="card-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=MyApp/data_pengguna" title="Kembali" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.card -->
</section>

<?php
	$koneksi = new mysqli ("localhost","root","","perpustakaan");
    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_pengguna (nama_pengguna,username,password,level) VALUES (
        '".$_POST['nama_pengguna']."',
        '".$_POST['username']."',
        '".md5($_POST['password'])."',
        '".$_POST['level']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
        window.location = 'index.php?page=MyApp/data_pengguna';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
        window.location = 'index.php?page=MyApp/add_pengguna';
        }
      })</script>";
    }
     //selesai proses simpan data
}
    
