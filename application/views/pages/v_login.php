<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon/favicon-32x32.png')?>" sizes="32x32" />
  <title><?php echo $title ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/fontawesome/css/all.min.css')?>">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/components.css')?>">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <!-- NOTIF LOGIN DAN LOGOUT-->
            <?php
                $message = $this->session->flashdata('notif');
                if($message){
                    echo '<p class="alert alert-warning text-center">'.$message .'</p>';
                }
            ?>
            <div class="login-brand">
              <img src="assets/img/logo/r.png" alt="logo" width="80"><small></small>
            </div>
            <div class="alert alert-warning">
              <h5 class="text-center"><?php echo $judul_header ?></h5>
            </div>
            <div class="card card-warning">
              <div class="card-body">
                <form method="POST" action="<?= site_url('login/cek_login')?>">
                  <div class="form-group">
                    <label><i class="fas fa-fingerprint text-warning"></i> Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" tabindex="1" required autofocus>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label><i class="fas fa-key text-warning"></i> Password</label>
                    </div>
                    <input type="password" class="form-control" placeholder="Password" name="password" tabindex="2" required>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-warning btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>

                </form>
              </div>
            </div>
            <div class="simple-footer">
              <?php echo $footer ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?php echo base_url('assets/modules/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/popper.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/tooltip.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/nicescroll/jquery.nicescroll.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/moment.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/stisla.js')?>"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/js/scripts.js')?>"></script>
  <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>
</html>