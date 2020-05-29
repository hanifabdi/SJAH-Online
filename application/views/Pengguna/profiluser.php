 <div class="title-page" style="color: black; font-family: viga; padding-bottom: 35px; margin-left: 3%; ">
            <h2>Profil Hotel</h2>
        </div>

            <div class="row">
      <div class="col-lg-8">
        <?= $this->session->flashdata('message'); ?>
      </div>
    </div>

        <div class="card" style="box-shadow: 3px 3px 15px blue;">
        <div class="card shadow" >
          <div class="card-body">

    <div class="row" style="margin-left: 2%;">
  <div class="col-lg-8">

    <form>

    <div class="form-group row" style="">
      
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-5">
            <img style="margin-bottom: 30px;" src="<?= base_url('assets/image/profil/') . $hotel['foto']; ?>" class="card-img" >
          </div>
          <div class="col-lg-7">
             <h5 style="margin-bottom: 30px;color: black; font-family: Viga;" class="card-title">&nbsp;Profil Saya</h5>
        <h6 style="margin-bottom: 20px;color: black;font-family: Viga;" class="card-text">&nbsp;&nbsp;Nama Responden &nbsp;:&nbsp; <?= $hotel['nama_responden'] ?></h6>
        <h6 style="margin-bottom: 20px; color: black;font-family: Viga;" class="card-text">&nbsp;&nbsp; Asal Hotel &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <?= $hotel['nama_hotel'] ?></h6>
        <h6 style="margin-bottom: 40px; color: black;font-family: Viga;" class="card-text">&nbsp;&nbsp;&nbsp;Kode Rahasia &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?= $hotel['kode'] ?></h6>
        <h6 style="color: black; font-family: Viga;" class="card-text">&nbsp;&nbsp;Akun resmi akomodasi Hotel oleh Badan Pusat Statistik Kota Bandar Lampung </h6>

          </div>
        </div>
      </div>
      </div>

    </form>
    
  </div>
</div>

</div>
</div>
</div>