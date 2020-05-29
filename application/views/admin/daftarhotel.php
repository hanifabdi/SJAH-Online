      <div class="title-page text-center" style="color: black; font-family: Viga; padding-bottom: 30px; padding-top: 1px;">
            <h1>Daftar Hotel</h1>
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
           <a href="<?= base_url('c_admin_tambahhotel');?>" class="btn btn-primary mb-3 " style="margin-right: 45%; margin-left: 10px; font-family: Viga;">Tambah Data</a>

             <div class="col-md-5 " style=" margin-top: 2px;">
            <form action="<?= base_url('c_admin_daftarhotel') ?>" method="post">
              <div class="input-group mb-3">
                <input style="font-family: Viga;" type="text" class="form-control" placeholder="Klik submit untuk Pencarian/Refresh" name="carihotel" autocomplete="off" autofocus>
                <div class="input-group-append">
                  <input style="font-family: Viga;" class="btn btn-primary" type="submit" name="submit">
                </div>
              </div>
            </form>
          </div>
        
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                  <thead class="text-center"style="background-color: #4169E1;">
                    <tr style="color: white; font-family: Viga">
                    <th >Nama Responden</th>
                    <th >Nama Hotel</th>
                    <th >Username</th>
                    <th >Kode</th>
                    <th >Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php if (empty($data_hotel)) : ?>
                      <tr>
                        <td colspan="6">
                          <div style="font-family: Viga;" class="alert alert-danger" role="alert">
                            Data tidak ditemukan!
                          </div>
                        </td>
                      </tr>
                    <?php endif; ?>
                  <?php foreach ($data_hotel as $data_hotel): ?>
                  <tr style="color: black; font-family: Viga; text-align: center;">
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
                      <?= $data_hotel->kode ?>
                    </td>
                    
                    <td width="130">
                      <a href="<?=  base_url('c_admin_daftarhotel/delete/') . $data_hotel->user ?>" class="btn btn-small text-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="fas fa-trash"></i> Hapus</a>
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
 
       