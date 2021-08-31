<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i style="color: #ffc107;" class="fa fa-desktop fa-sm"></i> Lihat Laporan Penjualan Berdasarkan Tanggal</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form method="post" action="<?php echo site_url('laporan/cari')?>">
                <div class="form-group">
                  <label for="start_date">Tanggal awal</label>
                  <input type="date" id="tgl_awal" class="form-control" name="start_date">
                </div>

                <div class="form-group">
                  <label for="end_date">Tanggal Akhir</label>
                  <input type="date" id="tgl_akhir" class="form-control" name="end_date">
                </div>

                <div class="form-group">
                  <button id="btnCari" type="submit" class="btn btn-warning"><i class="fas fa-search"></i> Cari</button>
                </div>
              </form>
            </div>
          </div>
        </div>       
      </div>

      <div class="row">
        <div class="col-12">
          <div id="result"></div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- End Main Content -->

<!-- Ajax -->

<script type="text/javascript">
  $(function(){
    $("#btnCari").click(function(){
      var $form = $('#laporanPage').find('form'),
          $tgl_awal = $('#tgl_awal').val(),
          $tgl_akhir = $('#tgl_akhir').val(),
          $url = $form.attr('action');
      
    })
  })
</script>

<!-- Ajax -->