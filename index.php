<?php
// session_start();
// if (!isset($_SESSION['loggedin'])) {
//     header('Location: login.php');
//     exit;
// }

// $level = $_SESSION['level'];
// $username = $_SESSION['username'];
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
	header("location: login.php");
} else {
	$id = $_SESSION["ses_id"];
	$nama = $_SESSION["ses_nama"];
	$username = $_SESSION["ses_username"];
	$level = $_SESSION["ses_level"];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
  <link rel="icon" href="app/dist/img/pp.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="app/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="app/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="app/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="app/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="app/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="app/plugins/daterangepicker/daterangepicker.css">
  <!-- DataTables -->
	<link rel="stylesheet" href="app/plugins/datatables-autofill/css/autoFill.bootstrap4.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="app/plugins/select2/css/select2.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="app/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="app/plugins/sweetalert2/sweetalert2.min.css">
  <script src="app/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="app/plugins/datatables/jquery.dataTables.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="app/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="app/dist/img/perpus.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Perpustakaan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="app/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $username; ?> | <?php echo $level?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-header">MAIN NAVIGATION</li>
        <?php if ($level == "Administrator") { ?>
          <li class="nav-item">
            <a href="http://localhost/perpustakaan/index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
              
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-folder"></i>
              <p>
                Kelola Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=MyApp/data_buku" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Data Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=MyApp/data_agt" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Data Anggota</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="?page=data_sirkul" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Sirkulasi
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Log data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=log_pinjam" class="nav-link">
                  <i class="fa fa-arrow-down nav-icon"></i>
                  <p>Peminjaman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=log_kembali" class="nav-link">
                  <i class="fa fa-arrow-up nav-icon"></i>
                  <p>Pengambalian</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-print"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=laporan_sirkulasi" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Laporan Sirkus</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">SETTING</li>
          <li class="nav-item">
            <a href="?page=MyApp/data_pengguna" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Pengguna Sistem
              </p>
            </a>
          </li>

          <?php
					} elseif ($level == "Petugas") {
					?>
          <li class="nav-item">
            <a href="http://localhost/perpustakaan/index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
              
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-folder"></i>
              <p>
                Kelola Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=MyApp/data_buku" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Data Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=MyApp/data_agt" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Data Anggota</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="?page=data_sirkul" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Sirkulasi
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Log data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=log_pinjam" class="nav-link">
                  <i class="fa fa-arrow-down nav-icon"></i>
                  <p>Peminjaman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=log_kembali" class="nav-link">
                  <i class="fa fa-arrow-up nav-icon"></i>
                  <p>Pengambalian</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-print"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=laporan_sirkulasi" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Laporan Sirkus</p>
                </a>
              </li>
            </ul>
          </li>
          <?php
					}elseif ($level == "User") {
					?>
          <li class="nav-item">
            <a href="?page=data_sirkul" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Pinjam buku
              </p>
            </a>
          </li>
          <?php }?>


          <li class="nav-item">
            <a href="logout.php"  onclick="return confirm('Anda yakin keluar dari aplikasi ?')" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <?php
				if (isset($_GET['page'])) {
					$hal = $_GET['page'];

					switch ($hal) {
							//Klik Halaman Home Pengguna
						case 'admin':
							include "home/admin.php";
							break;
						case 'petugas':
							include "home/petugas.php";
							break;

							//Pengguna
						case 'MyApp/data_pengguna':
							include "admin/pengguna/data_pengguna.php";
							break;
						case 'MyApp/add_pengguna':
							include "admin/pengguna/add_pengguna.php";
							break;
						case 'MyApp/edit_pengguna':
							include "admin/pengguna/edit_pengguna.php";
							break;
						case 'MyApp/del_pengguna':
							include "admin/pengguna/del_pengguna.php";
							break;


							//agt
						case 'MyApp/data_agt':
							include "admin/agt/data_agt.php";
							break;
						case 'MyApp/add_agt':
							include "admin/agt/add_agt.php";
							break;
						case 'MyApp/edit_agt':
							include "admin/agt/edit_agt.php";
							break;
						case 'MyApp/del_agt':
							include "admin/agt/del_agt.php";
							break;
						case 'MyApp/print_agt':
							include "admin/agt/print_agt.php";
							break;
						case 'MyApp/print_allagt':
							include "admin/agt/print_allagt.php";
							break;


							//buku
						case 'MyApp/data_buku':
							include "admin/buku/data_buku.php";
							break;
						case 'MyApp/add_buku':
							include "admin/buku/add_buku.php";
							break;
						case 'MyApp/edit_buku':
							include "admin/buku/edit_buku.php";
							break;
						case 'MyApp/del_buku':
							include "admin/buku/del_buku.php";
							break;

							//sirkul
						case 'data_sirkul':
							include "admin/sirkul/data_sirkul.php";
							break;
						case 'add_sirkul':
							include "admin/sirkul/add_sirkul.php";
							break;
						case 'panjang':
							include "admin/sirkul/panjang.php";
							break;
						case 'kembali':
							include "admin/sirkul/kembali.php";
							break;

							//log
						case 'log_pinjam':
							include "admin/log/log_pinjam.php";
							break;
						case 'log_kembali':
							include "admin/log/log_kembali.php";
							break;

							//laporan
						case 'laporan_sirkulasi':
							include "admin/laporan/laporan_sirkulasi.php";
							break;
						case 'MyApp/print_laporan':
							include "admin/laporan/print_laporan.php";
							break;


							//default
						default:
							echo "<center><br><br><br><br><br><br><br><br><br>
				  <h1> Halaman tidak ditemukan !</h1></center>";
							break;
					}
				} else {
					// Auto Halaman Home Pengguna
					if ($level == "Administrator") {
						include "home/admin.php";
					} elseif ($level == "Petugas") {
						include "home/petugas.php";
					}
				}
				?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024 Victor</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="app/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="app/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="app/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="app/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="app/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="app/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="app/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="app/plugins/moment/moment.min.js"></script>
<script src="app/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="app/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="app/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="app/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- jQuery -->
<script src="app/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="app/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="app/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="app/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="app/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="app/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="app/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="app/plugins/jszip/jszip.min.js"></script>
<script src="app/plugins/pdfmake/pdfmake.min.js"></script>
<script src="app/plugins/pdfmake/vfs_fonts.js"></script>
<script src="app/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="app/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="app/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="app/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="app/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="app/dist/js/pages/dashboard.js"></script>


<script>
        $(function() {
            // Initialize DataTable for #example1
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            // Initialize DataTable for #example2
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true
            });
        });
    </script>
</body>
</html>
