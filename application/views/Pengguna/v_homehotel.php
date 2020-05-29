<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SJAH-Online</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/'); ?>https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <!-- punya saya-->
  <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet">

</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('c_homeuser')?>">
        <img style="height: 50px;"class="img" src="<?= base_url('assets/image/lolo.png')?>">
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('c_homeuser');?>">
          <i class="fas fa-fw fa-home" style="color: white;"></i>
          <span style="font-family: Viga;">Beranda</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider"style="margin-top: 10px;">

      <!-- Nav Item - upload -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('c_user_upload');?>">
          <i class="fas fa-fw fa-file-excel" style="color: white;"></i>
          <span style="font-family: Viga;" >Upload Berkas</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block" style="margin-top: 10px; padding-top: 10px;">

      <!-- Nav Item - History -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('c_user_history');?>">
          <i class="fas fa-fw fa-history" style="color: white;"></i>
          <span style="font-family: Viga;">Riwayat Pengiriman</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block" style="margin-top: 10px; padding-top: 10px;">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
 
      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-gradient-primary topbar mb-4 static-top shadow">

           <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span style="font-family: Viga; font-size: 15px;" class="mr-2 d-none d-lg-inline text-white small"><?= $hotel['nama_hotel'] ;?></span>
                <img class="img-profile rounded-circle" src="<?= base_url('assets/image/profil/') . $hotel['foto']; ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a style="font-family: Viga;" class="dropdown-item" href="<?= base_url('c_user_profiluser') ?>">
                  <i style="color: black;"  class="fas fa-user fa-sm fa-fw mr-2"></i>
                  Profil Saya
                </a>
                <a style="font-family: Viga;" class="dropdown-item" href="<?= base_url('c_user_editprofil') ?>">
                  <i style="color: black;"  class="fas fa-cogs fa-sm fa-fw mr-2"></i>
                  Edit Profil
                </a>
                <div class="dropdown-divider"></div>
                <a style="font-family: Viga;" class="dropdown-item" href="<?= base_url('c_login/logout');?>" data-toggle="modal" data-target="#logoutModal">
                  <i style="color: black;" class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                  Keluar
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

         <?php $this->load->view($konten); ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="footer " style=" margin-top: 190px; bottom: 0;">
        <div class="container "style=" box-shadow: 0px -3px 5px 0px rgba(0,0,0,5); margin-top: 100px;">
          <div class="copyright text-center" style="color: black; font-family: Viga; background-color:#DCDCDC; padding-top: 15px; padding-bottom:15px;">
            <h7>Badan Pusat Statistik Kota Bandar Lampung</h7>
            <br>
            <h7>Jl. Sutan Syahrir No. 30, Pahoman, Bandar Lampung, 35215.</h7>
            <h7>Telp. (0721)255980. Mailbox : bps1871@bps.go.id</h7>
            <br>
            <h7>Copyright © 2019</h7>
            <br>
            <h7>Built by © Mahasiswa Kerja Praktik <a href="http://if.itera.ac.id/">Prodi Teknik Informatika - <a href="https://www.itera.ac.id/">Institut Teknologi Sumatera</h7>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 style="font-family: Viga;" class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin keluar dari Halaman ini?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div style="font-family: Viga;" class="modal-body">Pilih Ya untuk melanjutkan!</div>
        <div class="modal-footer">
          <button style="font-family: Viga;" class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
          <a style="font-family: Viga;" class="btn btn-primary" href="<?= base_url('c_login/logout');?>">Ya</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

  <script>
    
    $('.custom-file-input').on('change', function(){
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);

    });

  </script>

</body>

</html>
