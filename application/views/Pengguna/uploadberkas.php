   <div class="title-page" style="color: black; font-family: viga; padding-bottom: 23px; ">
            <h2>Upload Berkas</h2>
        </div>

	<div class="card" style="box-shadow: 3px 3px 15px blue;">
<!-- DataTales Example -->

        <div class="card shadow" >
          <div class="card-body">
			<div class="row" style="margin-left: 2%;">
				<div class="col-12">
				<form style=" margin-bottom: 20px;">
				<a style="font-family: Viga;" href="<?= base_url('c_user_upload/lakukan_download');?>" class="btn btn-primary mb-3 " id="formdownload" >Download Form</a>
			</form>
		<div class="col-lg-8">

		

		<?= form_open_multipart('c_user_upload');?>
		 <div class="form-group row">
		    <label for="tahun" class="col-sm-3 col-form-label"style="color: black; font-family: Viga;">Tahun</label>
		    <div class="col-sm-8">
		      <input style="font-family: Viga;" type="number" class="form-control" id="tahun" name="tahun" value="<?= date('Y') ?>" >
		      <?=form_error('tahun','<small class="text-danger pl-3">','</small>');?>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="bulan" class="col-sm-3 col-form-label"style="color: black; font-family: Viga;">Bulan</label>
		    <div class="col-sm-8">
		      <input style="font-family: Viga;" type="text" class="form-control" id="bulan" name="bulan" value="<?= date('m')-1 ?>"  >
		      <?=form_error('bulan','<small class="text-danger pl-3">','</small>');?>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="pengirim" class="col-sm-3 col-form-label"style="color: black; font-family: Viga;">Nama Pengirim</label>
		    <div class="col-sm-8">
		      <input style="font-family: Viga;" type="text" class="form-control" id="pengirim" name="pengirim" value="<?= $hotel['nama_responden'] ?>"readonly >
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="asal_hotel" class="col-sm-3 col-form-label"style="color: black; font-family: Viga;">Asal Hotel</label>
		    <div class="col-sm-8">
		      <input style="font-family: Viga;" type="text" class="form-control" id="asal_hotel" name="asal_hotel" value="<?= $hotel['nama_hotel'] ?>"readonly >
		    </div>
		  </div>

		  <div class="form-group row">
			<div class="col-sm-3"style="color: black; font-family: Viga;">Dokumen</div>
			<div class="col-sm-8">
				<div class="row">
					<div class="col-sm-4">
						<img src="<?= base_url('assets/berkas/admin/excel.jpg')?>" class="img-thumbnail">
					</div>
					<div class="col-sm-8">
						<div class="custom-file">
						  <input type="file" class="custom-file-input" id="file" name="file">
						  <label style="font-family: Viga; font-size: 15px;" class="custom-file-label" for="file" >Upload berkas</label>
						  <p style="font-size: 12px; font-family: Viga;"> Hanya dapat mengupload file berekstensi .xlsx & .xls (File Excel)</p>
						</div>
					</div>
				</div>
			</div>
		  </div>
		  
		  <div class="form-group row justify-content-end" style="margin-top: 30px; font-family: Viga;">
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
