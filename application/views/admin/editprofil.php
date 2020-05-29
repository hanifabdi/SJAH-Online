   <div class="title-page" style="color: black; font-family: Viga; padding-bottom: 5px; ">
            <h2>Edit Profil</h2>
        </div>

	<div class="card" style="box-shadow: 3px 3px 15px blue;">
<!-- DataTales Example -->

        <div class="card shadow" >
          <div class="card-body">
			<div class="row" style="margin-left: 2%;">
	<div class="col-lg-8">

		<?= form_open_multipart('c_admin_editprofil');?>
		 <div class="form-group row">
		    <label for="nip" class="col-sm-3 col-form-label"style="color: black;font-family: Viga;">NIP/NRK</label>
		    <div class="col-sm-8">
		      <input style="font-family: Viga; " type="number" class="form-control" id="nip" name="nip" autocomplete="off" required value="<?= $admin['nip'] ?>">
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="nama_admin" class="col-sm-3 col-form-label"style="color: black; font-family: Viga;">Nama Admin</label>
		    <div class="col-sm-8">
		      <input style="font-family: Viga;" type="text" class="form-control" id="nama_admin" name="nama_admin" required autocomplete="off" value="<?= $admin['nama_admin'] ?>">
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="jabatan" class="col-sm-3 col-form-label"style="color: black;font-family: Viga;">Jabatan</label>
		    <div class="col-sm-8">
		      <input style="font-family: Viga;" type="text" class="form-control" id="jabatan" name="jabatan" required autocomplete="off" value="<?= $admin['jabatan'] ?>">
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="username" class="col-sm-3 col-form-label"style="color: black;font-family: Viga;">Username</label>
		    <div class="col-sm-8">
		      <input style="font-family: Viga;"type="text" class="form-control" id="username" name="username" required value="<?= $admin['username'] ?>" readonly>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="password" class="col-sm-3 col-form-label"style="color: black;font-family: Viga;">Password</label>
		    <div class="col-sm-8">
		      <input style="font-family: Viga;" type="password" class="form-control" id="password" name="password" required autocomplete="off" value="<?= $admin['password'] ?>">
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="kode" class="col-sm-3 col-form-label"style="color: black;font-family: Viga;">Kode Rahasia</label>
		    <div class="col-sm-8">
		      <input style="font-family: Viga;" type="text" class="form-control" id="kode" name="kode" required autocomplete="off" value="<?= $admin['kode'] ?>">
		    </div>
		  </div>

		  <div class="form-group row">
			<div class="col-sm-3"style="color: black;font-family: Viga;">Foto</div>
			<div class="col-sm-8">
				<div class="row">
					<div class="col-sm-4">
						<img src="<?= base_url('assets/image/profil/') . $admin['foto']; ?>" class="img-thumbnail">
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
