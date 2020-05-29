    <div class="title-page" style="color: black; font-family: Viga; padding-bottom: 5px; ">
            <h2>Edit Profil</h2>
        </div>

	<div class="card" style="box-shadow: 3px 3px 15px blue;">
<!-- DataTales Example -->

        <div class="card shadow" >
          <div class="card-body">
			<div class="row" style="margin-left: 2%;">
	<div class="col-lg-8">

		<?= form_open_multipart('c_user_editprofil');?>

		  <div class="form-group row">
		    <label for="nama_hotel" class="col-sm-3 col-form-label"style="color: black; font-family: Viga;">Nama Hotel</label>
		    <div class="col-sm-8">
		      <input style="font-family: Viga;" type="text" class="form-control" id="nama_hotel" name="nama_hotel" required autocomplete="off" value="<?= $hotel['nama_hotel'] ?>" readonly>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="nama_responden" class="col-sm-3 col-form-label"style="color: black; font-family: Viga;">Nama Lengkap</label>
		    <div class="col-sm-8">
		      <input style="font-family: Viga;" type="text" class="form-control" id="nama_responden" name="nama_responden" required autocomplete="off" value="<?= $hotel['nama_responden'] ?>">
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="user" class="col-sm-3 col-form-label"style="color: black; font-family: Viga;">Username</label>
		    <div class="col-sm-8">
		      <input style="font-family: Viga;" type="text" class="form-control" id="user" name="user" required value="<?= $hotel['user'] ?>" readonly>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="password" class="col-sm-3 col-form-label"style="color: black; font-family: Viga;">Password</label>
		    <div class="col-sm-8">
		      <input style="font-family: Viga;" type="password" class="form-control" id="password" name="password" required autocomplete="off" value="<?= $hotel['password'] ?>" >
		    </div>
		  </div>

		   <div class="form-group row">
		    <label for="kode" class="col-sm-3 col-form-label"style="color: black;font-family: Viga;">Kode Rahasia</label>
		    <div class="col-sm-8">
		      <input style="font-family: Viga;" type="text" class="form-control" id="kode" name="kode" required autocomplete="off" value="<?= $hotel['kode'] ?>">
		    </div>
		  </div>

		  <div class="form-group row">
			<div class="col-sm-3"style="color: black; font-family: Viga;">Foto</div>
			<div class="col-sm-8">
				<div class="row">
					<div class="col-sm-4">
						<img src="<?= base_url('assets/image/profil/') . $hotel['foto']; ?>" class="img-thumbnail">
					</div>
					<div class="col-sm-8">
						<div class="custom-file">
						  <input style="font-family: Viga;" type="file" class="custom-file-input" id="foto" name="foto">
						  <label style="font-family: Viga;" class="custom-file-label" for="foto" >.jpg/.png/.gif</label>
						</div>
					</div>
				</div>
			</div>
		  </div>
		  
		  <div class="form-group row justify-content-end" style="margin-top: 30px; font-family: Viga;">
		  	<div class="col-sm-9">
		  		<button type="submit" class="btn btn-primary">Simpan</button>
		  	</div>
		  </div>


		</form>
		
	</div>
</div>

</div>
</div>
</div>
