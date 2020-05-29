   <div class="title-page text-center" style="color: black; font-family: viga; padding-bottom: 30px; padding-top: 1px;">
            <h1>Dashboard</h1>
        </div>

  <div class="card" style="box-shadow: 3px 3px 15px blue;">
<!-- DataTales Example -->

        <div class="card shadow" >
          <div class="card-body">

          <div class="row">

            <!-- Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="font-family: Viga;"  class="text-sm font-weight-bold text-primary mb-1">Total Hotel (<?= date('Y') ?>)</div>
                      <div style="font-family: Viga;" class="h4 mb-0 font-weight-bold text-gray-800"><?= $total_hotel?></div>
                    </div>
                    <div class="col-auto">
                      <i style="color: blue;" class="fas fa-hotel fa-2x"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!--Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="font-family: Viga;" class="text-sm font-weight-bold text-success  mb-1">Total Pengguna (<?= date('Y') ?>)</div>
                      <div style="font-family: Viga;" class="h4 mb-0 font-weight-bold text-gray-800"><?= $total_pengguna?></div>
                    </div>
                    <div class="col-auto">
                      <i style="color: green;" class="fas fa-users fa-2x"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="font-family: Viga;" class="text-sm font-weight-bold text-danger mb-1">Total File diterima (<?= date('Y') ?>)</div>
                      <div style="font-family: Viga;" class="h4 mb-0 font-weight-bold text-gray-800"><?= $total_berkas?></div>
                    </div>
                    <div class="col-auto">
                      <i style="color: red" class="fas fa-file fa-2x"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="font-family: Viga;"  class="text-sm font-weight-bold text-primary mb-1">Total File diterima (<?= date('m')-1 ?> <?= date('Y') ?>)</div>
                      <div style="font-family: Viga;" class="h4 mb-0 font-weight-bold text-gray-800"><?= $total_bulan?></div>
                    </div>
                    <div class="col-auto">
                      <i style="color: blue;" class="fas fa-file-alt fa-2x"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


        </div>
        <!-- /.container-fluid -->
</div>
<h6 style="color: red; font-family: Viga; margin-left: 17%; margin-top: 30px;" class="card-title"><i style="margin-right: 5px;" class="fas fa-fw fa-exclamation-circle"></i>Untuk keamanan akun anda, diharapkan untuk segera mengganti password dan kode rahasia!</h6>
</div>
</div>