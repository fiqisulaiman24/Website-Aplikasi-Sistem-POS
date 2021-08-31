<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i style="color: #ffc107;" class="fa fa-user fa-sm"></i> Master Pegawai</h1>
    </div>

    <div class="section-body">
      <div style="margin-bottom: 20px;">
        <a href="#modalAddPegawai" class="btn btn-sm btn-warning" data-toggle="modal">
          <i class="fas fa-plus"></i> Tambah Data Pegawai
        </a>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card card-warning">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>                                 
                    <tr>
                      <th>No</th>
                      <th>Kode Pegawai</th>
                      <th>ID User</th>
                      <th>Nama Pegawai</th>
                      <th>Level</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    <?php 
                      $no = 1;
                      if(isset($data_pegawai)){
                        foreach ($data_pegawai as $row){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row->kd_pegawai; ?></td>
                      <td><?php echo $row->username; ?></td>
                      <td><?php echo $row->nama; ?></td>
                      <td><?php echo $row->level; ?></td>
                      <td width="150">
                        <a class="btn btn-sm btn-warning" href="#modalEditPegawai<?php echo $row->kd_pegawai?>" data-toggle="modal"><i class="fas fa-edit"></i> Edit
                        </a>
                        <a class="btn btn-sm btn-danger" href="<?php echo site_url('master_pegawai/hapus_pegawai/'.$row->kd_pegawai);?>" onclick="return confirm('Anda Yakin?')"><i class="fas fa-trash"></i> Hapus
                        </a>
                      </td>
                    </tr>
                    <?php }
                    } 
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- End Main Content -->

<!-- Modal Tambah Barang -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalAddPegawai">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title text-white"><i class="fa fa-user fa-sm"></i> Tambah Data Pegawai</h5>
        </div>
        <form method="post" action="<?php echo site_url('master_pegawai/tambah_pegawai')?>">
        <div class="modal-body">
          <div class="form-group">
            <label>Kode Pegawai</label>
            <input name="kd_pegawai" type="text" class="form-control" value="<?php echo $kd_pegawai; ?>" readonly>
          </div>

          <div class="form-group">
            <label>ID User</label>
            <input name="username" type="text" class="form-control" placeholder="Masukan Username">
          </div>

          <div class="form-group">
            <label>Password</label>
            <input name="password" type="password" class="form-control" placeholder="Masukan Password">
          </div>

          <div class="form-group">
            <label>Nama Pegawai</label>
            <input name="nama" type="text" class="form-control" placeholder="Masukan Nama Pegawai">
          </div>

          <div class="form-group">
            <label>Pilih Akses Level</label>
              <select name="level" id="level" class="form-control">
                <option>-Pilih Akses Level-</option>
                <option value="pegawai">Pegawai</option>
                <option value="admin">Admin</option>
              </select>
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
          <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Tambah Barang -->

<!-- Modal Edit Barang -->
<?php 
  if(isset($data_pegawai)){
    foreach ($data_pegawai as $row) {
  ?>
<div class="modal fade" tabindex="-1" role="dialog" id="modalEditPegawai<?php echo $row->kd_pegawai?>">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title text-white"><i class="fa fa-user fa-sm"></i> Edit Data Pegawai</h5>
        </div>
        <form method="post" action="<?php echo site_url('master_pegawai/edit_pegawai')?>">
        <div class="modal-body">
          <div class="form-group">
            <label>Kode Pegawai</label>
            <input name="kd_pegawai" type="text" class="form-control" value="<?php echo $row->kd_pegawai; ?>" readonly>
          </div>

          <div class="form-group">
            <label>ID User</label>
            <input name="username" type="text" class="form-control" value="<?php echo $row->username; ?>">
          </div>

          <div class="form-group">
            <label>Password</label>
            <input name="password" type="password" class="form-control">
          </div>

          <div class="form-group">
            <label>Nama Pegawai</label>
            <input name="nama" type="text" class="form-control" value="<?php echo $row->nama; ?>">
          </div>

          <div class="form-group">
            <label>Pilih Akses Level</label>
              <select name="level" id="level" class="form-control">
                <?php if($row->level == 'admin'){ ?>
                    <option value="admin" selected="selected">Admin</option>
                <?php }else{ ?>
                    <option value="pegawai" selected="selected">Pegawai</option>
                <?php } ?>
              </select>
          </div>

        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
          <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php }
}
?>
<!-- Modal Edit Barang -->