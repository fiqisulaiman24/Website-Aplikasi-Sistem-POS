<!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1><i style="color: #ffc107;" class="fa fa-desktop fa-sm"></i> Dashboard</h1>
      </div>

      <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1 card-warning">
                <div class="card-icon bg-primary">
                  <i class="fas fa-box"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Barang</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $this->model_app->get_data('tbl_barang')->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1 card-warning">
                <div class="card-icon bg-danger">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Pelanggan</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $this->model_app->get_data('tbl_pelanggan')->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1 card-warning">
                <div class="card-icon bg-warning">
                  <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Pegawai</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $this->model_app->get_data('tbl_pegawai')->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1 card-warning">
                <div class="card-icon bg-success">
                  <i class="fas fa-handshake"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Penjualan</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $this->model_app->get_data('tbl_penjualan_header')->num_rows(); ?>
                  </div>
                </div>
              </div>
            </div>                
          </div>
        
        <?php if(isset($data_contact)){
          foreach($data_contact as $row){
        ?>
          <!-- text-align: center; margin-top: 10px; -->
          <div class="card card-warning">
            <div class="card-body">
              <div class="data_contact" style="text-align: center">
                <h3 class="text-warning"><?php echo $row->nama?></h3>
                <h4 class="text-warning">~<?php echo $row->desc?>~</h4>
                <h5 class="text-warning"><?php echo $row->alamat?></h5>
                <h5 class="text-warning"><?php echo $row->email?><div class="bullet"></div><?php echo $row->telp?> <div class="bullet"></div> <?php echo $row->website?></h5>
              </div>
            </div>
          </div>
        <?php }
            }
          ?>
      </div>
    </section>
  </div>
<!-- End Main Content -->