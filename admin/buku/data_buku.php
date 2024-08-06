<section class="content-header">
	<h1 style="text-align:center;">
		Data Buku
	</h1>
</section>
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <a href="?page=MyApp/add_buku" title="Tambah Data" class="btn btn-primary">
              <i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
			  <div class="table-responsive">
                <table id="example1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Id Buku</th>
							<th>Judul Buku</th>
							<th>Pengarang</th>
							<th>Penerbit</th>
							<th>Tahun</th>
							<th>Kelola</th>
						</tr>
					</thead>
					<tbody>

						<?php
								$koneksi = new mysqli ("localhost","root","","perpustakaan");
						$no = 1;
						$sql = $koneksi->query("SELECT * from tb_buku");
						while ($data= $sql->fetch_assoc()) {
							?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['id_buku']; ?>
							</td>
							<td>
								<?php echo $data['judul_buku']; ?>
							</td>
							<td>
								<?php echo $data['pengarang']; ?>
							</td>
							<td>
								<?php echo $data['penerbit']; ?>
							</td>
							<td>
								<?php echo $data['th_terbit']; ?>
							</td>

							<td>
								<a href="?page=MyApp/edit_buku&kode=<?php echo $data['id_buku']; ?>" title="Ubah"
								 class="btn btn-success">
                                 <i class="far fa-edit"></i>
								</a>
								<a href="?page=MyApp/del_buku&kode=<?php echo $data['id_buku']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')"
								 title="Hapus" class="btn btn-danger">
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    