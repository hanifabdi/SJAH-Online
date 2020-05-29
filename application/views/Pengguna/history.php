      <div class="title-page text-center" style="color: black; font-family: viga; padding-bottom: 30px; padding-top: 1px;">
            <h1>Daftar Riwayat</h1>
        </div>

        <!-- DataTables -->
        <div class="card" style="box-shadow: 3px 3px 15px blue;">
<!-- DataTales Example -->

          <div class="card shadow" >
            <div class="card-body">
              <div class="row" >
                 <?= $this->session->flashdata('message'); ?>
              </div>
              <div class="row">
        
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                  <thead class="text-center"style="background-color: #4169E1;">
                    <tr style="color: white;">
                    <th style="font-family: Viga;" >Tahun</th>
                    <th style="font-family: Viga;" >Bulan</th>
                    <th style="font-family: Viga;" >Nama Pengirim</th>
                    <th style="font-family: Viga;" >Asal Hotel</th>
                    <th style="font-family: Viga;" >Dokumen</th>
                    <th style="font-family: Viga;" >Aksi</th>
                  </tr>
                  </thead>
                
                  <tbody>
                  <?php foreach ($data_history as $data_history): ?>
                  <tr style="color: black;">
                    <td style="font-family: Viga;" >
                      <?= $data_history->tahun ?>
                    </td>
                    <td style="font-family: Viga;">
                      <?= $data_history->bulan ?>
                    </td>
                    <td style="font-family: Viga;">
                      <?= $data_history->pengirim ?>
                    </td>
                    <td style="font-family: Viga;">
                      <?= $data_history->asal_hotel ?>
                    </td>
                    <td style="font-family: Viga;">
                      <?= $data_history->file ?>
                    </td>
                    
                    <td width="130px;" style="font-family: Viga;">
                      <a style="font-family: Viga;" href="<?=  base_url('c_user_history/delete/') . $data_history->id_berkas ?>" class="btn btn-small text-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="fas fa-fw fa-trash"></i> Hapus</a>
                    </td>

                  </tr>
                  <?php endforeach; ?>
                </tbody>
                
                </table>

                 <?= $this->pagination->create_links(); ?> 

              </div>
            </div>
          </div>
        </div>
      
      <!-- /.container-fluid -->
 
       