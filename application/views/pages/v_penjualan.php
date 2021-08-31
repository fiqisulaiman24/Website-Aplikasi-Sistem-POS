<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i style="color: #ffc107;" class="fa fa-box fa-sm"></i> Data Penjualan</h1>
    </div>

    <div class="section-body">
      <div style="margin-bottom: 20px;">
        <a href="<?php echo site_url('penjualan/pages_tambah_penjualan')?>" class="btn btn-sm btn-warning">
          <i class="fas fa-plus"></i> Tambah Data
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
                      <th>Tanggal</th>
                      <th>Kode Penjualan</th>
                      <th>Jumlah</th>
                      <th>Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    <?php 
                      $no = 1;
                      if(isset($data_penjualan)){
                        foreach ($data_penjualan as $row){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo date("d M Y",strtotime($row->tanggal_penjualan)) ?></td>
                      <td><?php echo $row->kd_penjualan; ?></td>
                      <td><?php echo $row->jumlah; ?> Items</td>
                      <td><?php echo currency_format($row->total_harga); ?></td>
                      <td width="250">
                        <a class="btn btn-sm btn-info" href="<?php echo site_url('penjualan/detail_penjualan/'.$row->kd_penjualan)?>"><i class="fas fa-eye"></i> View
                        </a>
                        <a class="btn btn-sm btn-success btnPrint" href="<?php echo site_url('cetak/print_penjualan/'.$row->kd_penjualan)?>"><i class="fas fa-print"></i> Print
                        </a>
                        <a class="btn btn-sm btn-danger" href="<?php echo site_url('penjualan/hapus/'.$row->kd_penjualan)?>" onclick="return confirm('Anda Yakin?')"><i class="fas fa-trash"></i> Hapus
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