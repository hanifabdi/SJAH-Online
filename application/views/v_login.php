 <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SJAH - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/'); ?>https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <!-- My Fonts -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans|Viga&display=swap" rel="stylesheet">


</head>

<body style="background-image: url(<?php echo base_url('assets/image/bg.jpg')?>); background-size: 100% 100%">
  


  <div class="container" style=" margin-top: 73px; ">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card my-5" style="box-shadow: 3px 3px 15px ; background-color: blue;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block ">
                <h4 style="margin-top: 25px; margin-left: 180px; font-family: Viga; color: white;">FORM LOGIN </h4>
                <p style="margin-left: 130px;color: white; font-family: Viga;"><em>"Make sure your account is secure!"</em></p>
                <img src="assets/image/hotel.png" width="420px"; height="260px"; style="margin-top: 5px; margin-left: 30px;"  >
              </div>
    
              <div class="col-lg-6" >
                <div class="p-5" >
                  <div class="text-center">
                    <img src="assets/image/BPS.png" style="margin-left: 20px;" width="70px" height="70px" >
                    <h1 class="h5 mb-4" style="font-family: Viga; color: white;">Badan Pusat Statistik <br> Kota Bandar Lampung</h1>
                    
                  </div>

                  <?= $this->session->flashdata('message'); ?>
                  
                  <form class="user" method="post" action="<?=base_url(); ?>">
                    <div class="form-group">
                      <input style="font-family: Viga;" type="text" class="form-control form-control-user" id="username" name="username" autocomplete="off" placeholder="Nama pengguna" value="<?= set_value('username')?>">
                      <?=form_error('username','<small class="text-danger pl-3">','</small>');?>
                    </div>
                    <div class="form-group">
                      <input style="font-family: Viga;" type="password" class="form-control form-control-user" id="password" name="password" autocomplete="off" placeholder="Kata sandi">
                      <?=form_error('password','<small class="text-danger pl-3">','</small>');?> 
                      
          
                    </div>



                    <button style="margin-bottom: 20px; font-family: Viga;" type="submit" class="btn btn-primary btn-user btn-block">
                      Masuk
                    </button>
                  </form>

                  <div class="text-center">
                    
                  <a class="large" href="<?= base_url('c_lupapassword') ?>" style="color: white; font-family: viga;">Lupa Password?</a>

                  </div>


                </div>
              </div>
            </div>
          </div>
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


</body>

</html>
