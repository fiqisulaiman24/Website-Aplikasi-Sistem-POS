<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i style="color: #ffc107;" class="fa fa-users fa-sm"></i> Master Pelanggan</h1>
    </div>

    <div class="section-body">
      <div style="margin-bottom: 20px;">
        <a href="#modalAddPelanggan" class="btn btn-sm btn-warning" data-toggle="modal">
          <i class="fas fa-plus"></i> Tambah Data Pelanggan
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
                      <th>Kode Pelanggan</th>
                      <th>Nama Pelanggan</th>
                      <th>Alamat</th>
                      <th>Email</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    <?php 
                      $no = 1;
                      if(isset($data_pelanggan)){
                        foreach ($data_pelanggan as $row){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row->kd_pelanggan; ?></td>
                      <td><?php echo $row->nm_pelanggan; ?></td>
                      <td><?php echo $row->alamat; ?></td>
                      <td><?php echo $row->email; ?></td>
                      <td width="150">
                        <a class="btn btn-sm btn-warning" href="#modalEditPelanggan<?php echo $row->kd_pelanggan?>" data-toggle="modal"><i class="fas fa-edit"></i> Edit
                        </a>
                        <a class="btn btn-sm btn-danger" href="<?php echo site_url('master_pelanggan/hapus_pelanggan/'.$row->kd_pelanggan);?>" onclick="return confirm('Anda Yakin?')"><i class="fas fa-trash"></i> Hapus
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
<div class="modal fade" tabindex="-1" role="dialog" id="modalAddPelanggan">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title text-white"><i class="fa fa-users fa-sm"></i> Tambah Data Pelanggan</h5>
        </div>
        <form method="post" action="<?php echo site_url('master_pelanggan/tambah_pelanggan')?>">
        <div class="modal-body">
          <div class="form-group">
            <label>Kode Pelanggan</label>
            <input name="kd_pelanggan" type="text" class="form-control" value="<?php echo $kd_pelanggan; ?>" readonly>
          </div>

          <div class="form-group">
            <label>Nama Pelanggan</label>
            <input name="nm_pelanggan" type="text" class="form-control" placeholder="Masukan Nama Pelanggan">
          </div>

          <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" type="text" class="form-control" placeholder="Masukan Alamat">
          </div>

          <div class="form-group">
            <label>Email</label>
            <input name="email" type="text" class="form-control" placeholder="Masukan Email">
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
  if(isset($data_pelanggan)){
    foreach ($data_pelanggan as $row) {
  ?>
<div class="modal fade" tabindex="-1" role="dialog" id="modalEditPelanggan<?php echo $row->kd_pelanggan?>">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title text-white"><i class="fa fa-users fa-sm"></i> Edit Data Pelanggan</h5>
        </div>
        <form method="post" action="<?php echo site_url('master_pelanggan/edit_pelanggan')?>">
        <div class="modal-body">
          <div class="form-group">
            <label>Kode Pelanggan</label>
            <input name="kd_pelanggan" type="text" class="form-control" value="<?php echo $row->kd_pelanggan; ?>" readonly>
          </div>

          <div class="form-group">
            <label>Nama Pelanggan</label>
            <input name="nm_pelanggan" type="text" class="form-control" value="<?php echo $row->nm_pelanggan; ?>">
          </div>

          <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" type="text" class="form-control" value="<?php echo $row->alamat; ?>">
          </div>

          <div class="form-group">
            <label>Email</label>
            <input name="email" type="text" class="form-control" value="<?php echo $row->email; ?>">
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