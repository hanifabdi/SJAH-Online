      <div class="title-page text-center" style="color: black; font-family: viga; padding-bottom: 30px; padding-top: 1px;">
            <h1>Daftar Survei</h1>
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
             <div class="col-md-5 " style=" margin-top: 2px; margin-left: 58%;font-family: Viga;">
            <form action="<?= base_url('c_admin_daftarsurvei') ?>" method="post">
              <div class="input-group mb-3">
                <input style="font-family: Viga;" type="text" class="form-control" placeholder="Klik submit untuk Pencarian/Refresh" name="cariberkas" autocomplete="off" autofocus>
                <div class="input-group-append">
                  <input style="font-family: Viga;" class="btn btn-primary" type="submit" name="submit">
                </div>
              </div>
            </form>
          </div>
        
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                  <thead class="text-center"style="background-color: #4169E1;">
                    <tr style="color: white;font-family: Viga;">
                    <th >Tahun</th>
                    <th >Bulan</th>
                    <th >Nama Pengirim</th>
                    <th >Asal Hotel</th>
                    <th >Dokumen</th>
                    <th >Aksi</th>
                  </tr>
                  </thead>
                
                  <tbody>
                   <?php if (empty($data_survei)) : ?>
                      <tr>
                        <td colspan="6">
                          <div style="font-family: Viga;" class="alert alert-danger" role="alert">
                            Data tidak ditemukan!
                          </div>
                        </td>
                      </tr>
                    <?php endif; ?>
                  <?php foreach ($data_survei as $data_survei): ?>
                  <tr style="color: black;font-family: Viga; text-align: center;">
                    <td >
                      <?= $data_survei->tahun ?>
                    </td>
                    <td>
                      <?= $data_survei->bulan ?>
                    </td>
                    <td>
                      <?= $data_survei->pengirim ?>
                    </td>
                    <td>
                      <?= $data_survei->asal_hotel ?>
                    </td>
                    <td>
                      <?= $data_survei->file ?>
                    </td>
                    
                    <td width="225px;">
                      <a href="<?=  base_url('c_admin_daftarsurvei/delete/') . $data_survei->id_berkas ?>" class="btn btn-small text-danger"><i class="fas fa-fw fa-trash"></i> Hapus</a>
                     <a href="<?=  base_url('assets/berkas'); ?>/<?= $data_survei->file ?>" data-toggle="tooltip" class="btn btn-small text-primary" target="_blank" ><i class="fas fa-fw fa-download"></i> Unduh</a>
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
 
       