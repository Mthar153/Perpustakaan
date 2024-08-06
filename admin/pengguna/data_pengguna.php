<section class="content-header">
	<h1>
		Pengguna Sistem
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="card">
		<div class="card-header">
			<a href="?page=MyApp/add_pengguna" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Level</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
				$koneksi = new mysqli ("localhost","root","","perpustakaan");		
                  $no = 1;
                  $sql = $koneksi->query("select * from tb_pengguna");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nama_pengguna']; ?>
							</td>
							<td>
								<?php echo $data['username']; ?>
							</td>
							<td>
								<?php echo $data['level']; ?>
							</td>
							<td>
								<a href="?page=MyApp/edit_pengguna&kode=<?php echo $data['id_pengguna']; ?>"
								 title="Ubah" class="btn btn-success">
								 <i class="far fa-edit"></i>
								</a>
								<a href="?page=MyApp/del_pengguna&kode=<?php echo $data['id_pengguna']; ?>"
								 onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger">
								 <i class="fas fa-trash-alt"></i>
							</td>
						</tr>
						<?php
                  }
                ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</section>