   <div class="title-page" style="color: black; font-family: viga; padding-bottom: 30px; padding-top: 1px;">
            <h2>Tambah Hotel</h2>
        </div>

  <div class="card" style="box-shadow: 3px 3px 15px blue;">
<!-- DataTales Example -->

        <div class="card shadow" >
          <div class="card-body">
      <div class="row" style="margin-left: 2%;">
  <div class="col-lg-8">

    <?= form_open_multipart('c_admin_tambahhotel');?>

      <div class="form-group row">
        <label for="nama_responden" class="col-sm-3 col-form-label" style="color: black;">Nama Responden</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="nama_responden" value="<?= set_value('nama_responden'); ?>" required name="nama_responden" autocomplete="off">
        </div>
      </div>

      <div class="form-group row">
        <label for="nama_hotel" class="col-sm-3 col-form-label"style="color: black;">Nama Hotel</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="nama_hotel" value="<?= set_value('nama_hotel'); ?>" required name="nama_hotel" autocomplete="off" >
           <?=form_error('nama_hotel','<small class="text-danger pl-3">','</small>');?>
        </div>
      </div>

      <div class="form-group row">
        <label for="user" class="col-sm-3 col-form-label"style="color: black;">Username</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="user" value="<?= set_value('user'); ?>" required name="user" autocomplete="off" >
          <?=form_error('user','<small class="text-danger pl-3">','</small>');?>
        </div>
      </div>

      <div class="form-group row">
        <label for="password" class="col-sm-3 col-form-label"style="color: black;">Password</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="password" value="<?= set_value('password'); ?>" required name="password" autocomplete="off" >
        </div>
      </div>
      
      <div class="form-group row justify-content-end" style="margin-top: 30px;">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>


    </form>
    
  </div>
</div>

</div>
</div>
</div>
