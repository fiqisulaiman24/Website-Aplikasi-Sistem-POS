<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i style="color: #ffc107;" class="fa fa-file-alt fa-sm"></i> Detail Penjualan</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <?php if(isset($dt_penjualan)){
                foreach($dt_penjualan as $row){
                  ?>
              <div class="row">
                  <div class="col-lg-12">
                    <div class="alert alert-warning">
                        <div class="alert-title text-center"><i class="fa fa-file-alt fa-sm"></i> Keterangan</div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-6">
                        <address>
                          <strong>Kode Penjualan : </strong><br>
                            <?php echo $row->kd_penjualan ?>
                        </address>

                        <address>
                          <strong>Tanggal Penjualan : </strong><br>
                          <?php echo date("d M Y", strtotime($row->tanggal_penjualan)); ?>
                        </address>

                        <address>
                          <strong>Total Harga : </strong><br>
                          <?php echo currency_format($row->total_harga); ?>
                        </address>
                      </div>
                      <div class="col-6">
                        <address>
                          <strong>Nama Pelanggan :</strong><br>
                          <?php echo $row->nm_pelanggan ?>
                        </address>

                        <address>
                          <strong>Alamat Pelanggan :</strong><br>
                          <?php echo $row->alamat ?>
                        </address>

                        <address>
                          <strong>Email Pelanggan : </strong><br>
                          <?php echo $row->email ?>
                        </address>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php }
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- End Main Content