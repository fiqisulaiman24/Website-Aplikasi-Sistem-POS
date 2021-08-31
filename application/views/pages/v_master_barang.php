<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i style="color: #ffc107;" class="fa fa-box fa-sm"></i> Master Barang</h1>
    </div>

    <div class="section-body">
      <div style="margin-bottom: 20px;">
        <a href="#modalAddBarang" class="btn btn-sm btn-warning" data-toggle="modal">
          <i class="fas fa-plus"></i> Tambah Data Barang
        </a>
      </div>
      <div class="row">
        <div class="col-12">
          <?php echo validation_errors(); ?>
          <div class="card card-warning">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>                                 
                    <tr>
                      <th>No</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Stok</th>
                      <th>Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    <?php 
                      $no = 1;
                      if(isset($data_barang)){
                        foreach ($data_barang as $row){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row->kd_barang; ?></td>
                      <td><?php echo $row->nm_barang; ?></td>
                      <td><?php echo $row->stok; ?></td>
                      <td><?php echo currency_format($row->harga); ?></td>
                      <td width="150">
                        <a class="btn btn-sm btn-warning" href="#modalEditBarang<?php echo $row->kd_barang?>" data-toggle="modal"><i class="fas fa-edit"></i> Edit
                        </a>
                        <a class="btn btn-sm btn-danger" href="<?php echo site_url('master_barang/hapus_barang/'.$row->kd_barang);?>" onclick="return confirm('Anda Yakin?')"><i class="fas fa-trash"></i> Hapus
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
<div class="modal fade" tabindex="-1" role="dialog" id="modalAddBarang">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title text-white"><i class="fa fa-box fa-sm"></i> Tambah Data Barang</h5>
        </div>
        <form method="post" action="<?php echo site_url('master_barang/tambah_barang')?>">
        <div class="modal-body">
          <?php echo validation_errors(); ?>
          <div class="form-group">
            <label>Kode Barang</label>
            <input name="kd_barang" type="text" class="form-control" value="<?php echo $kd_barang ?>" readonly>
          </div>

          <div class="form-group">
            <label>Nama Barang</label>
            <input name="nm_barang" type="text" class="form-control" placeholder="Masukan Nama Barang">
          </div>

          <div class="form-group">
            <label>Stok</label>
            <input name="stok" type="text" class="form-control" placeholder="Masukan Stok">
          </div>

          <div class="form-group">
            <label>Harga</label>
            <input name="harga" type="text" class="form-control" placeholder="Masukan Harga">
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
  if(isset($data_barang)){
    foreach ($data_barang as $row) {
  ?>
<div class="modal fade" tabindex="-1" role="dialog" id="modalEditBarang<?php echo $row->kd_barang?>">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title text-white"><i class="fa fa-box fa-sm"></i> Edit Data Barang</h5>
        </div>
        <form method="post" action="<?php echo site_url('master_barang/edit_barang')?>">
        <div class="modal-body">
          <div class="form-group">
            <label>Kode Barang</label>
            <input name="kd_barang" type="text" class="form-control" value="<?php echo $row->kd_barang; ?>" readonly>
          </div>

          <div class="form-group">
            <label>Nama Barang</label>
            <input name="nm_barang" type="text" class="form-control" value="<?php echo $row->nm_barang; ?>">
          </div>

          <div class="form-group">
            <label>Stok</label>
            <input name="stok" type="text" class="form-control" value="<?php echo $row->stok; ?>">
          </div>

          <div class="form-group">
            <label>Harga</label>
            <input name="harga" type="text" class="form-control" value="<?php echo $row->harga; ?>">
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