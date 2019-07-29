      <div class="title-page text-center" style="color: black; font-family: viga; padding-bottom: 30px; padding-top: 1px;">
            <h1>Data Arsip</h1>
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

             <div class="col-md-5 " style=" margin-top: 2px; margin-left: 58%;">
            <form action="<?= base_url('c_admin_daftararsip') ?>" method="post">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Klik submit untuk Pencarian/Refresh" name="cari" autocomplete="off" autofocus>
                <div class="input-group-append">
                  <input class="btn btn-primary" type="submit" name="submit">
                </div>
              </div>
            </form>
          </div>
        
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                  <thead class="text-center"style="background-color: #4169E1;">
                    <tr style="color: white;">
                    <th >Tahun</th>
                    <th >Bulan</th>
                    <th >Nama Pengirim</th>
                    <th >Asal Hotel</th>
                    <th >Dokumen</th>
                    <th >Action</th>
                  </tr>
                  </thead>
                <!-- 
                  <tbody>
                   <?php if (empty($data_hotel)) : ?>
                      <tr>
                        <td colspan="6">
                          <div class="alert alert-danger" role="alert">
                            Data tidak ditemukan!
                          </div>
                        </td>
                      </tr>
                    <?php endif; ?>
                  <?php foreach ($data_hotel as $data_hotel): ?>
                  <tr style="color: black;">
                    <td >
                      <?= $data_hotel->nama_responden ?>
                    </td>
                    <td>
                      <?= $data_hotel->nama_hotel ?>
                    </td>
                    <td>
                      <?= $data_hotel->user ?>
                    </td>
                    <td>
                      <?= $data_hotel->password ?>
                    </td>
                    
                    <td width="130">
                      <a href="<?=  base_url('c_admin_daftararsip/delete/') . $data_hotel->user ?>" class="btn btn-small text-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
                -->
                </table>
<!--  
                 <?= $this->pagination->create_links(); ?> 
  -->
              </div>
            </div>
          </div>
        </div>
      
      <!-- /.container-fluid -->
 
       