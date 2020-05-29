   <div class="title-page" style="color: black; font-family: Viga; padding-bottom: 5px; ">
            <h2>Tambah Kuesioner</h2>
        </div>

	<div class="card" style="box-shadow: 3px 3px 15px blue;">
<!-- DataTales Example -->

        <div class="card shadow" >
          <div class="card-body">
			<div class="row" style="margin-left: 2%;">
	<div class="col-lg-8">

		<?= form_open_multipart('c_admin_tambahkuesioner');?>
		 <div class="form-group row">
		    <label for="jumhari" class="col-sm-3 col-form-label"style="color: black;font-family: Viga;">Jumlah Hari</label>
		    <div class="col-sm-8">
		      <input style="font-family: Viga; " type="number" class="form-control" id="jumhari" name="jumhari" autocomplete="off" required placeholder="28/29/30/31">
		    </div>
		  </div>

		  <div class="form-group row">
			<div class="col-sm-3"style="color: black;font-family: Viga;">Kuesioner</div>
			<div class="col-sm-8">
				<div class="row">
					<div class="col-sm-4">
						<img src="<?= base_url('assets/berkas/admin/excel.jpg')?>" class="img-thumbnail">
					</div>
					<div class="col-sm-8">
						<div class="custom-file">
						  <input style="font-family: Viga;" type="file" class="custom-file-input" id="file" name="file">
						  <label style="font-family: Viga;" class="custom-file-label" for="file" >Upload Kuesioner</label>
						  <p style="font-size: 12px; font-family: Viga;"> Hanya dapat mengupload file berekstensi .xlsx & .xls (File Excel)</p>
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
