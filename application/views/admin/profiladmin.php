 <div class="title-page" style="color: black; font-family: viga; padding-bottom: 35px; margin-left: 3%; ">
            <h2>Profil Admin</h2>
        </div>

<div class="row">
  <div class="col-lg-8">
    <?= $this->session->flashdata('message'); ?>
  </div>
</div>

<div class="card mb-3 bg-gradient-primary" style="width: 750px; height: 265px; box-shadow: 3px 3px 15px blue; margin-left: 3%;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img style="height: 263px;" src="<?= base_url('assets/image/') . $admin['foto']; ?>" class="card-img" >
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 style="margin-bottom: 30px;color: white;" class="card-title">&nbsp;Profil Saya</h5>
        <h6 style="margin-bottom: 20px;color: white;" class="card-text">&nbsp;&nbsp;Nama Lengkap &nbsp;:&nbsp; <?= $admin['nama_admin'] ?></h6>
        <h6 style="margin-bottom: 20px; color: white;" class="card-text">&nbsp;&nbsp;NIP/NRK &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;:&nbsp; <?= $admin['nip'] ?></h6>
        <h6 style="margin-bottom: 40px; color: white;" class="card-text">&nbsp;&nbsp;Jabatan &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?= $admin['jabatan'] ?></h6>
        <h6 style="margin-bottom: 20px; color: white; font-family: viga; font-size: 18px;" class="card-text">&nbsp;&nbsp;Badan Pusat Statistik Kota Bandar Lampung</h6>
      </div>
    </div>
  </div>
</div>