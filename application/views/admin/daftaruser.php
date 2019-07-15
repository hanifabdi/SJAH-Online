 <div class="title-page text-center">
            <h3>Daftar Responden Hotel</h3>
        </div>



        <!-- DataTables -->
        <div class="card" style="">
<!-- DataTales Example -->
          <div class="card shadow">
            <div class="card-body">
              <div class="table-responsive">
                <div class="card" style="width: 170px; height: 40px; padding-top: 6px; margin-bottom: 8px; padding-left: 5px; border: 1px solid blue; background-color: white;">
            <a href="<?php echo site_url('c_admin_daftaruser/add') ?>" ><i class="fas fa-plus"></i> Tambah Pengguna</a>
          </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                  <thead style="background-color: blue;">
                    <tr>
                    <th>No</th>
                    <th>Nama Responden</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Foto</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <?php foreach ($pengguna as $pengguna): ?>
                  <tr>
                    <td>
                      <?php echo $pengguna->id_pengguna ?>
                    </td>
                    <td >
                      <?php echo $pengguna->nama_pengguna ?>
                    </td>
                    <td>
                      <?php echo $pengguna->user ?>
                    </td>
                    <td>
                      <?php echo $pengguna->password ?>
                    </td>
                    <td>
                      <img src="<?php echo base_url('upload/pengguna/'.$pengguna->foto) ?>" width="64" />
                    </td>
                    
                    <td width="250">
                      <a href="<?php echo site_url('c_admin_daftaruser/edit/'.$pengguna->id_pengguna) ?>"
                       class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                      <a onclick="deleteConfirm('<?php echo site_url('c_admin_daftaruser/delete/'.$pengguna->id_pengguna) ?>')"
                       href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                   <tbody>
                  <?php endforeach; ?>

                </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      <!-- /.container-fluid -->

       