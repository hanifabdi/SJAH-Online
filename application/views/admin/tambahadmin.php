   <div class="title-page " style="color: black; font-family: viga; padding-bottom: 30px; padding-top: 1px;">
            <h2>Tambah Admin</h2>
        </div>

	<div class="card" style="box-shadow: 3px 3px 15px blue;">
<!-- DataTales Example -->

        <div class="card shadow" >
          <div class="card-body">
			<div class="row" style="margin-left: 2%;">
				<div class="col-lg-8">

		<?= form_open_multipart('c_admin_tambahadmin');?>
		 <div class="form-group row">
		    <label for="nip" class="col-sm-3 col-form-label"style="color: black;font-family: Viga;">NIP/NRK</label>
		    <div class="col-sm-8">
		      <input style="font-family: Viga;" type="number" class="form-control" id="nip" value="<?= set_value('nip'); ?>"  required name="nip" autocomplete="off">
		       <?=form_error('nip','<small class="text-danger pl-3">','</small>');?>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="nama_admin" class="col-sm-3 col-form-label"style="color: black;font-family: Viga;">Nama Admin</label>
		    <div class="col-sm-8">
		      <input style="font-family: Viga;" type="text" class="form-control" id="nama_admin" value="<?= set_value('nama_admin'); ?>" required name="nama_admin" autocomplete="off">
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="jabatan" class="col-sm-3 col-form-label"style="color: black;font-family: Viga;">Jabatan</label>
		    <div class="col-sm-8">
		      <input style="font-family: Viga;" type="text" class="form-control" id="jabatan" value="<?= set_value('jabatan'); ?>" required name="jabatan" autocomplete="off" >
		    </div>
		  </div>

      <div class="form-group row">
        <label for="username" class="col-sm-3 col-form-label"style="color: black;font-family: Viga;">Username</label>
        <div class="col-sm-8">
          <input style="font-family: Viga;" type="text" class="form-control" id="username" value="<?= set_value('username'); ?>" required name="username" autocomplete="off" >
          <?=form_error('username','<small class="text-danger pl-3">','</small>');?>
        </div>
      </div>

		  <div class="form-group row">
		    <label for="password" class="col-sm-3 col-form-label"style="color: black;font-family: Viga;">Password</label>
		    <div class="col-sm-8">
		      <input style="font-family: Viga;" type="text" class="form-control" id="password" value="<?= set_value('password'); ?>" required name="password" autocomplete="off" >
		    </div>
		  </div>

		  <div class="form-group row">
        <label for="kode" class="col-sm-3 col-form-label"style="color: black;font-family: Viga;">Kode</label>
        <div class="col-sm-8">
          <input style="font-family: Viga;" type="text" class="form-control" id="kode" value="<?= set_value('password'); ?>" required name="kode" autocomplete="off" >
        </div>
      </div>
		  
		  <div class="form-group row justify-content-end" style="margin-top: 30px;">
		  	<div class="col-sm-10">
		  		<button style="font-family: Viga;" type="submit" class="btn btn-primary">Simpan</button>
		  	</div>
		  </div>


		</form>
		
	</div>
</div>
</div>
</div>
</div>
