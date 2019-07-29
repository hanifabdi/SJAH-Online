   <div class="title-page" style="color: black; font-family: viga; padding-bottom: 23px; ">
            <h2>Upload Berkas</h2>
        </div>

	<div class="card" style="box-shadow: 3px 3px 15px blue;">
<!-- DataTales Example -->

        <div class="card shadow" >
          <div class="card-body">
			<div class="row" style="margin-left: 2%;">
				<a href="<?= base_url('c_user_download');?>" class="btn btn-primary mb-3 " style=" margin-left: 80%;">Download File</a>
	<div class="col-lg-8">

		<?= form_open_multipart('c_user_upload');?>
		 <div class="form-group row">
		    <label for="tahun" class="col-sm-3 col-form-label"style="color: black;">Tahun</label>
		    <div class="col-sm-8">
		      <input type="number" class="form-control" id="tahun" name="tahun" readonly>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="bulan" class="col-sm-3 col-form-label"style="color: black;">Bulan</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="bulan" name="bulan" readonly>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="pengirim" class="col-sm-3 col-form-label"style="color: black;">Nama Pengirim</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="pengirim" name="pengirim" value="<?= $hotel['nama_responden'] ?>" readonly>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="asal_hotel" class="col-sm-3 col-form-label"style="color: black;">Asal Hotel</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="asal_hotel" name="asal_hotel" value="<?= $hotel['nama_hotel'] ?>" readonly>
		    </div>
		  </div>

		  <div class="form-group row">
			<div class="col-sm-3"style="color: black;">Dokumen</div>
			<div class="col-sm-8">
				<div class="row">
					<div class="col-sm-4">
						<img src="<?= base_url('assets/berkas/excel.jpg')?>" class="img-thumbnail">
					</div>
					<div class="col-sm-8">
						<div class="custom-file">
						  <input type="file" class="custom-file-input" id="file" name="file">
						  <label class="custom-file-label" for="file" >Upload berkas</label>
						</div>
					</div>
				</div>
			</div>
		  </div>
		  
		  <div class="form-group row justify-content-end" style="margin-top: 30px;">
		  	<div class="col-sm-9">
		  		<button type="submit" class="btn btn-primary">Upload</button>
		  	</div>
		  </div>


		</form>
		
	</div>
</div>

</div>
</div>
</div>
