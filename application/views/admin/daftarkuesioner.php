      <div class="title-page text-center" style="color: black; font-family: Viga; padding-bottom: 30px; padding-top: 1px;">
            <h1>Daftar Kuesioner</h1>
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
           <a href="<?= base_url('c_admin_tambahkuesioner');?>" class="btn btn-primary mb-3 " style="margin-right: 45%; margin-left: 10px; font-family: Viga;">Tambah Data</a>
        
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                  <thead class="text-center"style="background-color: #4169E1;">
                    <tr style="color: white; font-family: Viga;">
                    <th >No</th>    
                    <th >Jumlah Hari</th>  
                    <th >Dokumen</th>
                    <th >Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=1; foreach ($data_kuesioner as $data_kuesioner): ?>
                  <tr style="color: black;font-family: Viga; text-align: center;">
                    <td >
                      <?= $i++ ?>
                    </td>
                    <td >
                      <?= $data_kuesioner->jumhari ?>
                    </td>
                    <td >
                      <?= $data_kuesioner->file ?>
                    </td>
                    <td width="130">
                      <a href="<?=  base_url('c_admin_daftarkuesioner/delete/') . $data_kuesioner->id_form ?>" class="btn btn-small text-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      
      <!-- /.container-fluid -->
 
       